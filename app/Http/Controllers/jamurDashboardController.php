<?php

namespace App\Http\Controllers;

use App\Models\Jamur;
use Carbon\Carbon;

class jamurDashboardController extends Controller
{
    /**
     * Ambil data terbaru + tambahan info status (online/offline, relay, mode).
     * Meniru pola getLatestData() milik labDashboardController.
     */
    function getLatestData(): mixed
    {
        $latest = Jamur::getLatestData();

        // Belum ada data sama sekali
        if (!$latest) {
            return null;
        }

        // Status online/offline berdasarkan selisih waktu data terakhir
        if ($latest->created_at) {
            $timeDif = $latest->created_at->diffInSeconds(Carbon::now());
            $latest->online_status = $timeDif > 300 ? "Offline" : "Online";
        } else {
            $latest->online_status = "Offline";
        }

        $latest->status_message = $latest->online_status === "Online"
            ? "Perangkat IoT terhubung ke server dengan normal"
            : "Koneksi perangkat IoT dan server terputus";

        // Teks status pengabutan
        $latest->relay_text = $latest->status_relay ? "Pengabutan Aktif" : "Pengabutan Mati";

        // Rata-rata suhu 2 node (abaikan yang null)
        $suhu = array_filter([$latest->suhu_node1, $latest->suhu_node2], fn($v) => $v !== null);
        $latest->suhu_rata = count($suhu) ? round(array_sum($suhu) / count($suhu), 1) : 0;

        $lembab = array_filter([$latest->kelembaban_node1, $latest->kelembaban_node2], fn($v) => $v !== null);
        $latest->kelembaban_rata = count($lembab) ? round(array_sum($lembab) / count($lembab)) : 0;

        return $latest;
    }

    // Halaman utama dashboard jamur
    public function index()
    {
        $latest = $this->getLatestData();
        return view('jamur-dashboard', compact('latest'));
    }

    // Endpoint AJAX: angka terbaru (dipanggil JavaScript tiap beberapa detik)
    public function getDashboardData()
    {
        return response()->json([
            "data" => $this->getLatestData()
        ]);
    }

    // Endpoint AJAX: data grafik (suhu atau kelembaban) untuk hari terbaru
    public function chartData($data)
    {
        $data_select = [
            "suhu"       => ["suhu_node1", "suhu_node2", "created_at"],
            "kelembaban" => ["kelembaban_node1", "kelembaban_node2", "created_at"],
        ];

        // fallback kalau parameter tidak dikenal
        $columns = $data_select[$data] ?? $data_select["suhu"];

        $latestDate = Jamur::max("created_at");
        $latestDate = $latestDate ? date('Y-m-d', strtotime($latestDate)) : now()->format('Y-m-d');

        $chart = Jamur::select($columns)
            ->whereDate("created_at", $latestDate)
            ->get();

        return response()->json([
            "data" => $chart
        ]);
    }
}
