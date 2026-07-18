<?php

namespace App\Http\Controllers;

use App\Http\Requests\envStoreRequest;
use App\Http\Requests\espStoreRequest;
use App\Http\Requests\labStoreRequest;
use App\Models\Environment;
use App\Models\LabSubmersible;
use App\Models\Submersible;
use App\Models\SubmersibleConfig;
use App\Models\SubmersibleLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\Mime\Message;
use App\Http\Requests\jamurStoreRequest;
use App\Models\Jamur;

class espController extends Controller
{
    //
    function calc_power_to_energy($power, $time)
    {
        $time_min = $time / 60;
        return $power * $time_min / 60; //60 menit

    }

    function calc_new_average($last_average, $data_count, $input)
    {
        return ($last_average * $data_count  + $input) / ($data_count + 1);
    }

    public function store(espStoreRequest $request)
    {
        $validated = $request->validated();

        $today = Submersible::getTodayData();
        $latest = Submersible::getLatestData();

        $today_volume = $today?->volume_harian ?? 0;
        $latest_volume_total = $latest?->volume_total ?? 0;

        $today_use = $today?->durasi_pemakaian_harian ?? 0;
        $total_use = $latest?->durasi_pemakaian_total ?? 0;

        $connection_duration = $today?->durasi_koneksi ?? 0;

        $today_energy = $today?->energi_harian ?? 0;
        $latest_energy_total = $latest?->energi_total ?? 0;

        if (empty($today)) {
            $time_diff = 120;

            $validated['suhu_harian'] = $validated['suhu'];
        } else {
            $time_diff = $today->created_at->diffInSeconds(Carbon::now());
            if ($time_diff > 300 || $time_diff == 0) {
                $time_diff = 120;
            }

            $today_data_count = Submersible::todayDataCount();

            $validated['suhu_harian'] = $this->calc_new_average($today->suhu_harian, $today_data_count, $validated['suhu']);
        }

        if ($validated['volume'] > 0) {
            $validated['durasi_pemakaian_harian'] = $today_use + $time_diff;
            $validated['durasi_pemakaian_total'] = $total_use + $time_diff;
        } else {
            $validated['durasi_pemakaian_harian'] = $today_use;
            $validated['durasi_pemakaian_total'] = $total_use;
        }

        $validated['volume_harian'] = $today_volume + $validated['volume'];
        $validated['volume_total'] = $latest_volume_total + $validated['volume'];

        $validated['durasi_koneksi'] = $connection_duration + $time_diff;

        $current_energy = $this->calc_power_to_energy($validated['daya'], $time_diff);

        $validated['energi_harian'] = $today_energy + $current_energy;
        $validated['energi_total'] = $latest_energy_total + $current_energy;


        $save = Submersible::create($validated);

        $active_status = SubmersibleConfig::where('id', 1)->first();

        return response()->json([
            "status" => "Success",
            "message" => "Data berhasil disimpan",
            "data" => [
                "active_status" => $active_status->active_button,
                "data tersimpan" => $save
            ],
        ]);
    }


    public function labStore(LabStoreRequest $request)
    {
        $validated = $request->validated();

        $today = LabSubmersible::getTodayData();
        $latest = LabSubmersible::getLatestData();

        $today_use = $today?->durasi_pemakaian_harian ?? 0;
        $total_use = $latest?->durasi_pemakaian_total ?? 0;

        $connection_duration = $today?->durasi_koneksi ?? 0;

        $today_energy = $today?->energi_harian ?? 0;
        $latest_energy_total = $latest?->energi_total ?? 0;

        if (empty($today)) {
            $time_diff = 120;

            $validated['suhu_harian'] = $validated['suhu'];
        } else {
            $time_diff = $today->created_at->diffInSeconds(Carbon::now());
            if ($time_diff > 300 || $time_diff == 0) {
                $time_diff = 120;
            }

            $today_data_count = LabSubmersible::todayDataCount();

            $validated['suhu_harian'] = $this->calc_new_average($today->suhu_harian, $today_data_count, $validated['suhu']);
        }

        if ($validated['daya'] > 0) {
            $validated['durasi_pemakaian_harian'] = $today_use + $time_diff;
            $validated['durasi_pemakaian_total'] = $total_use + $time_diff;
        } else {
            $validated['durasi_pemakaian_harian'] = $today_use;
            $validated['durasi_pemakaian_total'] = $total_use;
        }

        $validated['durasi_koneksi'] = $connection_duration + $time_diff;

        $current_energy = $this->calc_power_to_energy($validated['daya'], $time_diff);

        $validated['energi_harian'] = $today_energy + $current_energy;
        $validated['energi_total'] = $latest_energy_total + $current_energy;


        $save = LabSubmersible::create($validated);

        $active_status = SubmersibleConfig::where('id', 2)->first();

        return response()->json([
            "status" => "Success",
            "message" => "Data berhasil disimpan",
            "data" => [
                "active_status" => $active_status->active_button,
                "data tersimpan" => $save
            ],
        ]);
    }


    public function logging()
    {
        $today = Submersible::select('id', 'suhu_harian', 'durasi_pemakaian_harian', 'volume_harian', 'energi_harian', 'created_at')
            ->whereDate('created_at', Carbon::today())
            ->latest()->first();

        if (!empty($today)) {
            $log = SubmersibleLog::create([
                "suhu_harian" => $today->suhu_harian,
                "durasi_pemakaian_harian" => $today->durasi_pemakaian_harian,
                "volume_harian" => $today->volume_harian,
                "energi_harian" => $today->energi_harian,
                "active" => 1,
                "date" => Carbon::today(),
            ]);

            return response()->json($log);
        } else {
            return response()->json([
                "Message" => "Tidak ada data hari ini",
            ]);
        }
    }

    public function storeEnv(envStoreRequest $request)
    {
        $validated = $request->validated();

        foreach ($validated as $key => $value) {
            // Cek apakah nilainya integer 0 atau string "0"
            if ($value === 0 || $value === '0.0') {
                $validated[$key] = null;
            }
        }

        $today = Environment::getTodayData();

        if (empty($today)) {
           $validated['suhu_harian'] = $validated['suhu'];
        } else {
            $today_data_count = Environment::todayDataCount();

            $validated['suhu_harian'] = $this->calc_new_average(
                $today->suhu_harian,
                $today_data_count,
                $validated['suhu']
            );
        }

        $save = Environment::create($validated);

        return response()->json([
            "status" => "Success",
            "message" => "Data berhasil disimpan",
         "data" => [
                "data tersimpan" => $save
            ],
        ]);
    }

    public function jamurStore(jamurStoreRequest $request)
    {
        $validated = $request->validated();

        // Simpan satu baris data jamur baru
        $save = Jamur::create($validated);

        return response()->json([
            "status"  => "Success",
            "message" => "Data jamur berhasil disimpan",
            "data"    => [
                "data tersimpan" => $save
            ],
        ]);
    }
}
