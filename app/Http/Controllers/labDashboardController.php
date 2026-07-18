<?php

namespace App\Http\Controllers;

use App\Models\LabSubmersible;
use App\Models\LabSubmersibleLog;
use App\Models\Submersible;
use App\Models\SubmersibleConfig;
use App\Models\SubmersibleLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class labDashboardController extends Controller
{
    //

    function calculateExpPower(int $lux, float $suhu, float $daya): array
    {
        // Guard: lux negatif tidak masuk akal secara fisik
        if ($lux < 0) {
            return [0.0, 0.0, 0];
        }

        $expPower = 0.04363957125 * $lux * (1.0 - 0.0026 * ($suhu - 25.0));

        // Guard: hasil expPower nol atau negatif → tidak bisa jadi pembagi
        if ($expPower <= 0) {
            return [0.0, 0.0, 0];
        }

        $deviasi = ($daya - $expPower) / $expPower * 100;

        $anomali = (abs($deviasi) < 5 || $daya == 0) ? 0 : 1;

        return [round($expPower, 2), round($deviasi, 4), $anomali];
    }

    function getLatestData(): mixed
    {
        $latest = LabSubmersible::latest()->first();

        // Guard: tidak ada data sama sekali di tabel
        if (!$latest) {
            return null; // atau throw new \RuntimeException('No sensor data found');
        }

        $max_power = LabSubmersible::todayMax($latest->created_at, 'daya') ?? 0;

        // Guard: debit null/negatif
        $debit = max(0, $latest->debit ?? 0);
        $latest->v_water = 0.0132 * $debit;

        $latest->status = ($latest->arus ?? 0) > 0 ? "Menyala" : "Mati";

        // Guard: division by zero pada arus = daya / tegangan
        $tegangan = $latest->tegangan ?? 0;
        if ($tegangan != 0) {
            $latest->arus = ($latest->daya ?? 0) / $tegangan;
        } else {
            $latest->arus = 0;
        }

        $latest->max_power = $max_power;

        $energiHarian = $latest->energi_harian ?? 0;
        $latest->biaya = $energiHarian * 1.7;
        $latest->emisi = $energiHarian * 0.00085;

        $energiTotal = $latest->energi_total ?? 0;
        $latest->total_biaya = $energiTotal * 1.7;
        $latest->total_emisi = $energiTotal * 0.00085;

        // intdiv() akan throw DivisionByZeroError jika divisor 0, tapi 60 dan 3600 adalah konstanta → aman.
        // Null-safe tetap perlu karena nilai bisa null dari DB.
        $latest->durasi_pemakaian_harian = intdiv((int)($latest->durasi_pemakaian_harian ?? 0), 60);
        $latest->durasi_pemakaian_total  = intdiv((int)($latest->durasi_pemakaian_total  ?? 0), 3600);
        $latest->durasi_koneksi_j        = intdiv((int)($latest->durasi_koneksi          ?? 0), 3600);
        $latest->durasi_koneksi_m        = intdiv((int)($latest->durasi_koneksi          ?? 0), 60);

        // Guard: created_at null → diffInSeconds akan throw
        if ($latest->created_at) {
            $timeDif = $latest->created_at->diffInSeconds(Carbon::now());
            $latest->online_status = $timeDif > 300 ? "Offline" : "Online";
        } else {
            $latest->online_status = "Offline";
        }

        $statusMessage = [
            "Offline" => "Koneksi perangkat IoT dan server terputus",
            "Online"  => "Perangkat IoT terhubung ke server dengan normal",
        ];
        $latest->status_message = $statusMessage[$latest->online_status];

        $activeStatus = SubmersibleConfig::select("id", "active_button")->where('id', 2)->first();

        // Guard: config row tidak ditemukan
        if (!$activeStatus) {
            $latest->active_status            = 0;
            $latest->active_message_button    = "Nyalakan Pompa";
            $latest->active_message_title     = "Pompa sedang dimatikan";
            $latest->active_message_subtitle  = "Tekan tombol untuk menyalakan pompa";
        } elseif ($activeStatus->active_button == 0) {
            $latest->active_status            = 0;
            $latest->active_message_button    = "Nyalakan Pompa";
            $latest->active_message_title     = "Pompa sedang dimatikan";
            $latest->active_message_subtitle  = "Tekan tombol untuk menyalakan pompa";
        } else {
            $latest->active_status            = $activeStatus->active_button;
            $latest->active_message_button    = "Matikan Pompa";
            $latest->active_message_title     = "Pompa sedang diaktifkan";
            $latest->active_message_subtitle  = "Tekan tombol untuk mematikan pompa";
        }

        $expPower = $this->calculateExpPower(
            (int)($latest->intensitas_cahaya ?? 0),
            (float)($latest->suhu ?? 25.0),  // fallback ke suhu referensi 25°C
            (float)($latest->daya ?? 0)
        );

        $latest->pv_estimasi = $expPower[0];
        $latest->pv_deviasi  = $expPower[1];
        $latest->pv_anomali  = $expPower[2];

        return $latest;
    }

    function getLogs()
    {
        $logs = LabSubmersibleLog::select('id', 'active', 'date', 'energi_harian', 'durasi_pemakaian_harian', 'suhu_harian')
            ->where('active', 1)->latest()->limit(7)->get();

        return $logs;
    }

    public function index()
    {

        $latest = $this->getLatestData();
        $logs = $this->getLogs();

        $latest->suhu_mingguan = $logs->avg('suhu_harian');

        return view('lab-dashboard', compact('latest', 'logs'));
    }

    public function getDashboardData()
    {
        $latest = $this->getLatestData();

        return response()->json([
            "data" => $latest
        ]);
    }

    public function chartData($data)
    {
        $data_select = [
            "power" => ["daya", "tegangan", "energi_harian", "created_at"],
            "environment" => ["suhu", "intensitas_cahaya", "created_at"]
        ];

        $latestDate = LabSubmersible::max("created_at");
        $latestDate = date('Y-m-d', strtotime($latestDate));

        $chart = LabSubmersible::select($data_select[$data])->whereDate("created_at", $latestDate)->get();

        return response()->json([
            "data" => $chart
        ]);
    }

    public function heatMapData()
    {
        // Ambil tanggal data terbaru
        $latestDate = LabSubmersibleLog::max('date');

        // Jika tidak ada data sama sekali, gunakan hari ini
        if (!$latestDate) {
            $latestDate = now()->format('Y-m-d');
        }

        // Ambil semua data yang mungkin dibutuhkan (16 hari terakhir dari tanggal terbaru)
        $logs = LabSubmersibleLog::select("suhu_harian", "date", "created_at")
            ->where('date', '<=', $latestDate)
            ->orderBy('date', 'desc')
            ->get()
            ->keyBy('date'); // Index by date untuk memudahkan pencarian

        // Generate 16 hari dari tanggal terbaru
        $heatmapData = [];
        $latestDateObj = \Carbon\Carbon::parse($latestDate);

        for ($i = 15; $i >= 0; $i--) {
            $date = $latestDateObj->copy()->subDays($i)->format('Y-m-d');

            // Cek apakah ada data untuk tanggal ini
            if (isset($logs[$date])) {
                $log = $logs[$date];
                $heatmapData[] = [
                    'suhu_harian' => $log->suhu_harian,
                    'date' => $log->date,
                    'created_at' => $log->created_at,
                    'value' => ($log->suhu_harian - 25) * 10
                ];
            } else {
                // Jika tidak ada data, isi dengan 0
                $heatmapData[] = [
                    'suhu_harian' => '0',
                    'date' => $date,
                    'created_at' => null,
                    'value' => 0
                ];
            }
        }

        return response()->json([
            "data" => $heatmapData
        ]);
    }
}
