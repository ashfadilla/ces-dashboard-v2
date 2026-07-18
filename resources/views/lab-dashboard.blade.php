<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>CES - Living Lab</title>
    <!-- <link rel="icon" type="image/png" href="{{ asset(`assets/logo/ces-logo.png`) }}"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            font-feature-settings: 'cv02', 'cv03', 'cv04', 'cv11';
        }
    </style>
</head>

<!-- Overlay -->
<aside id="overlay" class="hidden fixed top-0 right-0 left-0 bottom-0 z-10 bg-gray-600 opacity-40 cursor-pointer"></aside>

<!-- Side Bar -->
<aside id="sidebar"
    class="fixed transform -translate-x-full left-0 top-0 w-full lg:w-94 h-screen bg-[#FFFFF0] shadow-2xl z-30 text-xl text-[#383838] overflow-y-auto">
    <div class="flex items-center justify-between mb-10 mt-8 mx-7">
        <div class="flex items-center gap-4">
            <img src="{{ asset('assets/logo/ces-logo.png') }}" alt="" class="w-11 h-12">
            <div>
                <h1>CES</h1>
                <p class="text-base text-gray-400">Control Energy System</p>
            </div>
        </div>
        <button id="sidebar-close" type="button" class="cursor-pointer">
            <div class="hover:bg-[#F4F7F3] rounded-full px-3 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-layout-sidebar  text-[#383838]" viewBox="0 0 16 16">
                    <path d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5-1v12h9a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM4 2H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h2z" />
                </svg>
            </div>
            <!-- <i class="bi bi-layout-sidebar hover:bg-[#F4F7F3] rounded-full px-3 py-2"></i> -->
        </button>
    </div>
    <hr class="my-7 text-gray-300">
    <div class="flex items-center gap-4 px-11">
        <svg width="17" height="17" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8.74005 2.43V6.31C8.74005 6.63127 8.67661 6.94938 8.55337 7.24606C8.43012 7.54275 8.2495 7.81218 8.02186 8.03889C7.79423 8.26559 7.52406 8.44511 7.22687 8.56714C6.92968 8.68918 6.61132 8.75132 6.29005 8.75H2.43005C2.10965 8.75194 1.79216 8.68917 1.49661 8.56545C1.20105 8.44173 0.933522 8.25961 0.710052 8.03C0.483167 7.805 0.303495 7.53697 0.181575 7.24161C0.0596541 6.94625 -0.00205975 6.62952 5.24403e-05 6.31V2.44C4.702e-05 1.7946 0.255744 1.17549 0.711173 0.718185C1.1666 0.260883 1.78466 0.00264508 2.43005 0H6.30005C6.62012 0.000307515 6.93694 0.0641026 7.23218 0.187692C7.52742 0.311281 7.79521 0.492209 8.02005 0.72C8.24754 0.942984 8.42836 1.20902 8.55198 1.50261C8.6756 1.79619 8.73953 2.11145 8.74005 2.43ZM19.4901 2.44V6.31C19.4849 6.9538 19.2275 7.56991 18.7732 8.02609C18.3189 8.48227 17.7038 8.74217 17.0601 8.75H13.1801C12.5333 8.74604 11.9132 8.49155 11.4501 8.04C11.2238 7.81249 11.0446 7.54258 10.9227 7.24572C10.8009 6.94886 10.7388 6.63088 10.7401 6.31V2.44C10.7392 2.11977 10.8025 1.80261 10.9262 1.50722C11.0498 1.21182 11.2314 0.944162 11.4601 0.72C11.6849 0.492209 11.9527 0.311281 12.2479 0.187692C12.5432 0.0641026 12.86 0.000307515 13.1801 0H17.0501C17.6956 0.00522707 18.3132 0.263976 18.7696 0.720437C19.2261 1.1769 19.4848 1.79449 19.4901 2.44ZM19.4901 13.19V17.06C19.4849 17.7038 19.2275 18.3199 18.7732 18.7761C18.3189 19.2323 17.7038 19.4922 17.0601 19.5H13.1801C12.5291 19.5066 11.9013 19.2591 11.4301 18.81C11.2029 18.5831 11.0231 18.3134 10.9012 18.0164C10.7793 17.7193 10.7177 17.401 10.7201 17.08V13.21C10.7192 12.8898 10.7825 12.5726 10.9062 12.2772C11.0298 11.9818 11.2114 11.7142 11.4401 11.49C11.6649 11.2622 11.9327 11.0813 12.2279 10.9577C12.5232 10.8341 12.84 10.7703 13.1601 10.77H17.0301C17.6756 10.7752 18.2932 11.034 18.7496 11.4904C19.2061 11.9469 19.4648 12.5645 19.4701 13.21L19.4901 13.19ZM8.74005 13.2V17.07C8.73218 17.7155 8.47091 18.332 8.01257 18.7866C7.55424 19.2412 6.93559 19.4974 6.29005 19.5H2.43005C2.11057 19.5013 1.79399 19.4394 1.49857 19.3177C1.20315 19.1961 0.934743 19.0171 0.708833 18.7912C0.482923 18.5653 0.303981 18.2969 0.182331 18.0015C0.0606802 17.7061 -0.00127049 17.3895 5.24403e-05 17.07V13.2C0.00262864 12.5545 0.258845 11.9358 0.713436 11.4775C1.16803 11.0191 1.78456 10.7579 2.43005 10.75H6.30005C6.94826 10.7566 7.56854 11.0148 8.03005 11.47C8.48614 11.9301 8.74143 12.5521 8.74005 13.2Z" fill="black" />
        </svg>
        <h1>Dashboard</h1>
    </div>
    <div class="flex items-center gap-4 mx-11 pl-2">
        <div class="w-0.5 h-20 bg-slate-300"></div>
        <div class="w-full">
            <a href="{{ route('dashboard.living-lab') }}">
                <div class="flex items-center gap-4 p-2 m-2 rounded-xl hover:bg-gray-200">
                    <h1>Living Lab</h1>
                </div>
            </a>
            <a href="{{ route('dashboard.lab-scale') }}">
                <div class="flex items-center gap-4 p-2 m-2 rounded-xl hover:bg-gray-200">
                    <h1>Lab Scale</h1>
                </div>
            </a>
            <a href="{{ route('dashboard.jamur') }}">
            <div class="flex items-center gap-4 p-2 m-2 rounded-xl hover:bg-gray-200">
                <h1>Jamur</h1>
            </div>
            </a>
        </div>
    </div>
    <hr class="my-5 text-gray-300">
</aside>

<body class="lg:px-28 px-6 lg:pt-12 pt-8 bg-[#F4F7F3]">
    <section class="flex items-center justify-between">
        <div class="flex items-center gap-8">
            <button type="button" id="hamburger" class="cursor-pointer hover:bg-gray-200 rounded-full px-2 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
            </button>
            <div>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('assets/logo/ces-logo.png') }}" alt="Logo" class="w-12 h-13 hidden lg:block">
                    <div>
                        <h1 class="text-2xl">Dashboard Monitoring <span class="hidden lg:inline-block">Lab Scale</span></h1>
                        <h2 class="text-sm text-gray-500 inline-block lg:hidden">Pemantauan operasional pompa</h2>
                        <h2 class="text-lg text-gray-500 hidden lg:inline-block">Pantau status operasional, debit air, dan konsumsi daya pompa air secara akurat.
                    </div>
                </div>
                </h2>
            </div>
        </div>

        <a class="text-[#FFFFF0] text-xl px-4 py-2 bg-[#4CAF50] rounded-2xl hidden lg:inline-block" href="{{ route('exportCsv', 'lab-scale') }}">
            <div class="flex items-center gap-3">
                <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.5 18L7.875 12.375L9.45 10.7437L12.375 13.6687V4.5H14.625V13.6687L17.55 10.7437L19.125 12.375L13.5 18ZM6.75 22.5C6.13125 22.5 5.60175 22.2799 5.1615 21.8396C4.72125 21.3994 4.50075 20.8695 4.5 20.25V16.875H6.75V20.25H20.25V16.875H22.5V20.25C22.5 20.8687 22.2799 21.3986 21.8396 21.8396C21.3994 22.2806 20.8695 22.5007 20.25 22.5H6.75Z"
                        fill="white" />
                </svg>
                <h1>Export</h1>
            </div>
        </a>
    </section>

    <section id="horizontal-bar" class="my-7 rounded-2xl bg-[#FFFFF0] overflow-hidden">

        {{-- ── BARIS ATAS : Status Pompa ── --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-6 px-7 lg:px-7 border-b border-slate-100">

            {{-- Kiri: Dot, Judul, Subjudul --}}
            <div class="flex items-start sm:items-center gap-3 md:gap-4">
                {{-- Dot Status Pompa --}}
                <div class="mt-1 sm:mt-0 w-2.5 h-2.5 rounded-full shrink-0 transition-colors duration-300 
                {{ $latest->status ? 'bg-[#10A7E8] ring-4 ring-[#10A7E8]/20' : 'bg-slate-300 ring-4 ring-slate-300/30' }}">
                </div>

                <div class="flex flex-col">
                    <div class="flex items-center gap-2 flex-wrap">
                        <h3 id="active_message_title" class="text-sm font-semibold text-slate-800 leading-tight">
                            {{ $latest->active_message_title }}
                        </h3>
                    </div>
                    <p id="active_message_subtitle" class="text-xs text-slate-500 mt-1">
                        {{ $latest->active_message_subtitle }}
                    </p>
                </div>
            </div>

            {{-- Kanan: Tombol --}}
            <a id="active_message_button" href="{{ route('pumpActivation', ['scale' => 'lab-scale']) }}"
                class="w-full sm:w-auto text-center shrink-0 bg-slate-50 hover:bg-slate-100 border border-slate-200 text-[#10A7E8] rounded-lg py-2 px-5 text-sm font-semibold cursor-pointer transition-colors">
                {{ $latest->active_message_button }}
            </a>
        </div>

        {{-- ── BARIS BAWAH : Deteksi Anomali PV ── --}}
        <div class="flex flex-col md:flex-row">

            {{-- Kolom Status Badge (Kiri) --}}
            <div class="flex items-center gap-3 py-4 px-5 lg:px-6 md:w-48 shrink-0 border-b md:border-b-0 md:border-r border-slate-100 bg-slate-50/50">
                {{-- Dot Anomali/Normal --}}
                <div class="w-2.5 h-2.5 rounded-full shrink-0 
                {{ $latest->pv_anomali ? 'bg-[#EF4444] ring-4 ring-[#EF4444]/20 animate-pulse' : 'bg-[#22c55e] ring-4 ring-[#22c55e]/20' }}">
                </div>
                {{-- Teks Badge --}}
                <span class="text-xs font-bold uppercase tracking-widest
                {{ $latest->pv_anomali ? 'text-[#EF4444]' : 'text-[#22c55e]' }}">
                    {{ $latest->pv_anomali ? 'Anomali' : 'Normal' }}
                </span>
            </div>

            {{-- Kolom Bar & Data (Kanan) --}}
            <div class="flex-1 py-4 px-5 lg:px-6 flex flex-col justify-center">

                {{-- Judul Bar & Persentase --}}
                <div class="flex items-center justify-between gap-4 mb-3">
                    <p class="text-sm font-semibold m-0 truncate {{ $latest->pv_anomali ? 'text-[#EF4444]' : 'text-slate-800' }}">
                        {{ $latest->pv_anomali ? 'Anomali terdeteksi pada panel surya' : 'Panel surya berfungsi normal' }}
                    </p>
                    <span class="text-sm font-bold shrink-0 {{ $latest->pv_anomali ? 'text-[#EF4444]' : 'text-[#22c55e]' }}">
                        {{ ($latest->pv_deviasi > 0 ? '+' : '') . number_format($latest->pv_deviasi, 1) }}%
                    </span>
                </div>

                {{-- Progress Bar (Skala -10% s/d +10%) --}}
                <div class="h-1.5 bg-slate-200 rounded-full relative mb-1.5">
                    {{-- Penanda/Ticks --}}
                    <div class="absolute left-1/2 top-0 bottom-0 w-px bg-slate-400"></div>
                    <div class="absolute -top-0.5 -bottom-0.5 w-px bg-slate-300" style="left:25%"></div>
                    <div class="absolute -top-0.5 -bottom-0.5 w-px bg-slate-300" style="left:75%"></div>

                    @php
                    $deviasi = max(-10, min(10, $latest->pv_deviasi ?? 0));
                    $width = abs($deviasi) * 5;
                    $left = $deviasi < 0 ? 50 - $width : 50;
                        @endphp

                        {{-- Bar Fill Dinamis --}}
                        <div class="absolute top-0 h-full rounded-full transition-all duration-500 
                    {{ $latest->pv_anomali ? 'bg-[#EF4444]' : 'bg-[#22c55e]' }}"
                        style="width: {{ $width }}%; left: {{ $left }}%;">
                </div>
            </div>

            {{-- Label Skala Bar --}}
            <div class="flex justify-between text-[10px] text-slate-400 font-medium mb-4">
                <span>−10%</span>
                <span>−5%</span>
                <span>0</span>
                <span>+5%</span>
                <span>+10%</span>
            </div>

            {{-- Data Detail (Aktual, Estimasi, Threshold) --}}
            <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-xs text-slate-500">
                <div>
                    Aktual
                    <span class="ml-1 font-semibold {{ $latest->pv_anomali ? 'text-[#EF4444]' : 'text-slate-800' }}">
                        {{ $latest->daya ?? 0 }} W
                    </span>
                </div>
                <div>
                    Estimasi
                    <span class="ml-1 font-semibold text-slate-800">{{ $latest->pv_estimasi ?? 0 }} W</span>
                </div>
                <div>
                    Threshold
                    <span class="ml-1 font-semibold text-slate-800">±5%</span>
                </div>
            </div>

        </div>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-6 gap-5 text-[#979797]">
        <div class="bg-[#FFFFF0] rounded-[20px] p-10 col-span-3">
            <div class="block lg:flex items-center justify-between mb-6 text-gray-800">
                <div class="flex items-center gap-4 text-xl">
                    <div class="p-3 bg-[#62A19E] rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white"
                            class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                            <path
                                d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                        </svg>
                    </div>
                    <h1>Daya Listrik <br> Panel Surya</h1>
                </div>
                <h1 class="text-xl mx-auto w-fit mt-4 lg:mt-0 lg:mx-0"><span id="daya" class="text-4xl">{{ $latest->daya }} </span>W</h1>
            </div>
            <hr class="my-4">
            <div class="flex justify-between">
                <h1>Tegangan</h1>
                <h1><span id="tegangan">{{ $latest->tegangan }}</span> Volt</h1>
            </div>
            <div class="flex justify-between">
                <h1>Arus</h1>
                <h1><span id="arus">{{ number_format($latest->arus, 2) }}</span> Amp</h1>
            </div>
            <div class="flex justify-between">
                <h1>Daya puncak</h1>
                <h1>
                    <span id="max_power">{{ $latest->max_power }}</span> Wp
                </h1>
            </div>
        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-10 col-span-3">
            <div class="block lg:flex items-center justify-between mb-6 text-gray-800">
                <div class="flex items-center gap-4 text-xl">
                    <div class="p-3 bg-[#62A19E] rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white"
                            class="bi bi-lightning-fill" viewBox="0 0 16 16">
                            <path
                                d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641z" />
                        </svg>
                    </div>
                    <h1>Penggunaan <br> Energi Listrik</h1>
                </div>
                <h1 class="text-xl mx-auto w-fit mt-4 lg:mt-0 lg:mx-0"><span id="energi_harian" class="text-4xl">{{ number_format(($latest->energi_harian / 1000), 2) }}</span> kWh</h1>
            </div>
            <hr class="my-4">
            <div class="flex justify-between">
                <h1>Penghematan biaya</h1>
                <h1>Rp. <span id="biaya">{{ number_format($latest->biaya, 0, ',', '.') }}</span></h1>
            </div>
            <div class="flex justify-between">
                <h1>Reduksi emisi</h1>
                <h1><span id="emisi">{{ number_format($latest->emisi, 2) }}</span> kg CO²</h1>
            </div>
            <div class="flex justify-between">
                <h1>Durasi operasional</h1>
                <h1><span id="durasi_pemakaian_harian">{{ $latest->durasi_pemakaian_harian }}</span> menit</h1>
            </div>
        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-11 col-span-2 lg:col-span-4 text-gray-900">
            <div class="flex items-center justify-between mb-8 lg:ml-5">
                <div class="flex items-center justify-between">
                    <div class="flex gap-4 items-center">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 6C8.93913 6 7.92172 6.42143 7.17157 7.17157C6.42143 7.92172 6 8.93913 6 10V30C6 31.0609 6.42143 32.0783 7.17157 32.8284C7.92172 33.5786 8.93913 34 10 34H30C31.0609 34 32.0783 33.5786 32.8284 32.8284C33.5786 32.0783 34 31.0609 34 30V10C34 8.93913 33.5786 7.92172 32.8284 7.17157C32.0783 6.42143 31.0609 6 30 6H10ZM20 20C20.2652 20 20.5196 20.1054 20.7071 20.2929C20.8946 20.4804 21 20.7348 21 21V27C21 27.2652 20.8946 27.5196 20.7071 27.7071C20.5196 27.8946 20.2652 28 20 28C19.7348 28 19.4804 27.8946 19.2929 27.7071C19.1054 27.5196 19 27.2652 19 27V21C19 20.7348 19.1054 20.4804 19.2929 20.2929C19.4804 20.1054 19.7348 20 20 20ZM12 17C12 16.7348 12.1054 16.4804 12.2929 16.2929C12.4804 16.1054 12.7348 16 13 16C13.2652 16 13.5196 16.1054 13.7071 16.2929C13.8946 16.4804 14 16.7348 14 17V27C14 27.2652 13.8946 27.5196 13.7071 27.7071C13.5196 27.8946 13.2652 28 13 28C12.7348 28 12.4804 27.8946 12.2929 27.7071C12.1054 27.5196 12 27.2652 12 27V17ZM27 12C27.2652 12 27.5196 12.1054 27.7071 12.2929C27.8946 12.4804 28 12.7348 28 13V27C28 27.2652 27.8946 27.5196 27.7071 27.7071C27.5196 27.8946 27.2652 28 27 28C26.7348 28 26.4804 27.8946 26.2929 27.7071C26.1054 27.5196 26 27.2652 26 27V13C26 12.7348 26.1054 12.4804 26.2929 12.2929C26.4804 12.1054 26.7348 12 27 12Z" fill="black" />
                        </svg>
                        <div class="relative inline-block">
                            <button id="dropdownNavbarLink" class="flex items-center justify-between text-2xl">
                                <span id="selectedMode">Produksi Energi</span>
                                <svg id="caretIcon" class="ms-3 transition-transform duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar" class="hidden absolute -left-22 z-20 bg-[#FFFFF0] rounded-base shadow-xl w-80 mt-2">
                                <ul class="p-2 text-sm text-body font-medium">
                                    <li>
                                        <div class="flex p-2 rounded-sm hover:bg-gray-100">
                                            <div class="flex items-center h-5">
                                                <input id="helper-radio-1" type="radio" name="mode" value="power" class="w-4 h-4 text-gray-800 bg-[#FFFFF0] border-gray-300" checked>
                                            </div>
                                            <div class="ms-2 text-sm">
                                                <label for="helper-radio-1" class="font-medium text-gray-900 cursor-pointer">
                                                    <div>Produksi Energi</div>
                                                    <p class="text-xs font-normal text-gray-500">Daya dan energi listrik yang dihasilkan panel surya</p>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex p-2 rounded-sm hover:bg-gray-100">
                                            <div class="flex items-center h-5">
                                                <input id="helper-radio-3" type="radio" name="mode" value="environment" class="w-4 h-4 text-gray-800 bg-[#FFFFF0] border-gray-300">
                                            </div>
                                            <div class="ms-2 text-sm">
                                                <label for="helper-radio-3" class="font-medium text-gray-900 cursor-pointer">
                                                    <div>Kondisi Lingkungan</div>
                                                    <p class="text-xs font-normal text-gray-500">Suhu dan intensitas cahaya lingkungan</p>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative" style="height: 400px;">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-10 col-span-2">
            <div class="flex items-center gap-4 text-xl">
                <div class="p-3 bg-[#62A19E] rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="bi bi-asterisk"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-gray-900">Riwayat Aktivitas Terakhir</h1>
                    <h2 class="text-base">4 aktivitas terakhir</h2>
                </div>
            </div>

            @foreach ($logs->take(4) as $log)
            <hr class="my-4">
            <div class="flex items-center gap-5">
                <h1 class="px-2 py-4 text-white font-semibold rounded-full bg-yellow-500">{{ \Carbon\Carbon::parse($log->date)->format('d/m') }}</h1>
                <div class="w-full">
                    <h1 class="text-gray-900 text-xl lg:text-base">{{ \Carbon\Carbon::parse($log->date)->translatedFormat('d F Y') }}</h1>
                    <div class=" items-center justify-between hidden lg:flex">
                        <h1>{{ $log->durasi_harian ?? 0 }} menit</h1>
                        <h1>•</h1>
                        <h1>{{ $log->energi_harian }} kWh</h1>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between lg:hidden mt-3">
                <h1>{{ $log->durasi_harian ?? 0 }} menit</h1>
                <h1>•</h1>
                <h1>{{ $log->energi_harian }} kWh</h1>
            </div>
            @endforeach
            <hr class="my-4">

        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-10 col-span-2">
            <div class="flex items-center gap-4 text-xl">
                <div class="p-3 bg-[#62A19E] rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white"
                        class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                        <path
                            d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                    </svg>
                </div>
                <h1 class="text-gray-900">Intensitas Cahaya Lingkungan</h1>
            </div>

            <!-- Gauge Chart Container -->
            <div class="relative flex justify-center items-center pt-3">
                <canvas id="gaugeChart" width="250" height="150" class="block"></canvas>

                <!-- Value Display -->
                <div class="absolute inset-0 flex flex-col items-center justify-center" style="margin-top: 25px;">
                    <div class="text-xl font-semibold text-gray-900" id="intensitas_cahaya_card" data-lux="{{ $latest->intensitas_cahaya }}"><span id="intensitas_cahaya" class="text-5xl text-gray-900">{{ number_format(($latest->intensitas_cahaya/1000), 1) }}</span>k</div>
                    <span class="text-xl text-gray-900">Lux</span>
                </div>
            </div>
            <h1 class="text-center mt-4">Intensitas cahaya saat ini senilai <span id="intensitas_cahaya_text">{{ $latest->intensitas_cahaya }}</span> lux,<br class="hidden lg:block">cukup baik untuk menyalakan pompa</h1>
        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-10 col-span-2">
            <div class="block lg:flex items-center justify-between mb-6 text-gray-800">
                <div class="flex items-center gap-4 text-xl">
                    <div class="p-3 bg-[#62A19E] rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white"
                            class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                            <path
                                d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                        </svg>
                    </div>
                    <h1>Suhu Udara <br> Lingkungan</h1>
                </div>
                <h1 class="text-xl mx-auto w-fit mt-4 lg:mt-0 lg:mx-0"><span class="text-4xl">{{ $latest->suhu }} </span>°C</h1>
            </div>
            <hr class="my-4">
            <div class="flex justify-between">
                <h1>Rata-rata hari ini</h1>
                <h1><span id="suhu_harian">{{ $latest->suhu_harian }}</span> °C</h1>
            </div>
            <div class="flex justify-between">
                <h1>Rata-rata minggu ini</h1>
                <h1><span id="suhu_mingguan">{{ $latest->suhu_mingguan }}</span> °C</h1>
            </div>
            <hr class="my-4">

            <div id="heatmap-container" class="grid grid-cols-8 gap-2 lg:px-4">
                <!-- Dots akan diisi oleh JavaScript -->
            </div>

            <div class="flex items-center justify-center gap-5 pt-4">
                <div class="flex items-center gap-2">
                    <div class="size-3 rounded-full bg-[#e5e7eb]"></div>
                    <h1>Dingin</h1>
                </div>
                <div class="flex items-center gap-2">
                    <div class="size-3 rounded-full bg-[#22c55e]"></div>
                    <h1>Panas</h1>
                </div>
            </div>

        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-10 col-span-2">
            <div class="flex items-center gap-4 text-xl">
                <div class="p-3 bg-[#62A19E] rounded-full">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_3350_6)">
                            <path
                                d="M14 24.5C13.1833 24.5 12.4931 24.218 11.9292 23.6541C11.3653 23.0902 11.0833 22.4 11.0833 21.5833C11.0833 20.7666 11.3653 20.0764 11.9292 19.5125C12.4931 18.9486 13.1833 18.6666 14 18.6666C14.8167 18.6666 15.5069 18.9486 16.0708 19.5125C16.6347 20.0764 16.9167 20.7666 16.9167 21.5833C16.9167 22.4 16.6347 23.0902 16.0708 23.6541C15.5069 24.218 14.8167 24.5 14 24.5ZM7.40833 17.9083L4.95833 15.4C6.10556 14.2527 7.45228 13.3439 8.9985 12.6735C10.5447 12.003 12.2119 11.6674 14 11.6666C15.7881 11.6658 17.4557 12.0061 19.0027 12.6875C20.5497 13.3688 21.896 14.2924 23.0417 15.4583L20.5917 17.9083C19.7361 17.0527 18.7444 16.3819 17.6167 15.8958C16.4889 15.4097 15.2833 15.1666 14 15.1666C12.7167 15.1666 11.5111 15.4097 10.3833 15.8958C9.25555 16.3819 8.26389 17.0527 7.40833 17.9083ZM2.45 12.95L0 10.5C1.78889 8.67218 3.87917 7.24302 6.27083 6.21246C8.6625 5.1819 11.2389 4.66663 14 4.66663C16.7611 4.66663 19.3375 5.1819 21.7292 6.21246C24.1208 7.24302 26.2111 8.67218 28 10.5L25.55 12.95C24.0528 11.4527 22.3176 10.2814 20.3443 9.43596C18.3711 8.59052 16.2563 8.1674 14 8.16663C11.7437 8.16585 9.62928 8.58896 7.65683 9.43596C5.68439 10.283 3.94878 11.4543 2.45 12.95Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_3350_6">
                                <rect width="28" height="28" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </div>
                <h1 class="text-gray-900">Konektivitas Perangkat IoT</h1>
            </div>

            <h1 class="text-gray-900 text-4xl my-6 text-center" id="online_status">{{ $latest->online_status }}</h1>
            <h2 class="text-center" id="status_message">{{ $latest->status_message }}</h2>

            <hr class="my-4">
            <div class="flex justify-between">
                <h1>Update data terakhir</h1>
                <h1 id="created_at_desktop" class="lg:inline-block hidden">{{ \Carbon\Carbon::parse($latest->created_at)->format('H:i:s d/m/Y') }}</h1>
                <h1 id="created_at_mobile" class="block lg:hidden">{{ \Carbon\Carbon::parse($latest->created_at)->format('H:i d/m') }}</h1>
            </div>
            <div class="flex justify-between">
                <h1>Durasi terhubung</h1>
                <h1><span id="durasi_koneksi_j">{{ $latest->durasi_koneksi_j }}</span> jam - <span id="durasi_koneksi_m">{{ $latest->durasi_koneksi_m }}</span> menit</h1>
            </div>
        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-10 col-span-2">
            <div class="flex items-center gap-4 text-xl">
                <div class="p-3 bg-[#62A19E] rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="bi bi-asterisk"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-gray-900">Statistik Total Penggunaan</h1>
                    <h2 class="text-base hidden lg:inline-block">Jan 2026 - {{ \Carbon\Carbon::parse($latest->created_at)->translatedFormat('M Y') }}</h2>
                </div>
            </div>

            <h1 class="text-5xl text-gray-900 my-10 text-center"> {{ number_format($latest->energi_total/1000, 2) }} <span class="text-3xl">kWh</span></h1>

            <hr class="my-3">
            <div class="flex justify-between">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#979797"
                        class="bi bi-stopwatch" viewBox="0 0 16 16">
                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5z" />
                        <path
                            d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64l.012-.013.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5M8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3" />
                    </svg>
                    <h1>Durasi operasional</h1>
                </div>
                <h1>{{ $latest->durasi_pemakaian_total }} jam</h1>
            </div>
            <hr class="my-3">
            <div class="flex justify-between">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#979797" class="bi bi-fire"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />
                    </svg>
                    <h1>Reduksi emisi</h1>
                </div>
                <h1>{{ number_format($latest->total_emisi, 2) }} kg CO²</h1>
            </div>
            <hr class="my-3">
            <div class="flex justify-between">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#979797" class="bi bi-cash"
                        viewBox="0 0 16 16">
                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                        <path
                            d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z" />
                    </svg>
                    <h1>Penghematan <span class="hidden lg:inline-block">biaya</span></h1>
                </div>
                <h1>Rp. {{ number_format($latest->total_biaya, 0, ',', '.') }}</h1>
            </div>
            <hr class="my-3">
            <div class="flex justify-between">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#979797"
                        class="bi bi-lightning" viewBox="0 0 16 16">
                        <path
                            d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641zM6.374 1 4.168 8.5H7.5a.5.5 0 0 1 .478.647L6.78 13.04 11.478 7H8a.5.5 0 0 1-.474-.658L9.306 1z" />
                    </svg>
                    <h1>Produksi energi</h1>
                </div>
                <h1>{{ number_format(($latest->energi_total / 1000), 2) }} kWh</h1>
            </div>
            <hr class="my-3">
        </div>
        <div class="col-span-2 lg:col-span-4 bg-[#FFFFF0] rounded-[20px] p-10">
            <div class="flex items-center gap-5 mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" class="bi bi-geo-alt-fill"
                    viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                </svg>
                <h1 class="text-gray-900 text-2xl">Lokasi Pompa</h1>
            </div>
            <div class="w-full">
                <iframe id="maps" src="https://www.google.com/maps?q=-7.5620363,110.8541449&z=15&output=embed" width="100%"
                    height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <footer class="mt-12 bg-[#121212] rounded-2xl text-[#FFFFF0] -mx-4 mb-2 lg:mb-4 sm:-mx-8 lg:-mx-24">
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start
                gap-6 lg:gap-0
                px-6 sm:px-10 lg:px-16 pt-9 lg:pt-10
                text-center lg:text-left items-center lg:items-start">

            <div>
                <div class="flex items-center justify-center lg:justify-start gap-4">
                    <img src="{{ asset('assets/logo/ces-logo.png') }}" alt="Logo" class="w-10 h-11">
                    <h1 class="text-2xl lg:text-4xl leading-tight">Dashboard Monitoring</h1>
                </div>
                <p class="text-[#979797] mt-3 text-sm lg:text-base leading-relaxed">
                    Platform pemantauan kinerja operasional<br>
                    pompa air tenaga surya sragen
                </p>
            </div>

            <div class="flex flex-col items-center lg:items-end gap-3">
                <div>
                    <h1 class="text-base lg:text-xl leading-relaxed">Teknik Elektro</h1>
                    <h1 class="text-base lg:text-xl leading-relaxed">Universitas Sebelas Maret</h1>
                </div>
                <div class="flex items-center gap-4">
                    <a href="https://mail.google.com/mail/u/0/?to=ditopranandito@student.uns.ac.id&fs=1&tf=cm"
                        target="_blank" rel="noopener noreferrer"
                        class="flex items-center gap-2 py-2 px-5 rounded-3xl border border-[#979797]
                          hover:border-white transition-colors duration-200">
                        <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_3388_220)">
                                <path d="M22.3863 20.1704H19.7726V8.98435L11.9317 13.7784L4.0908 8.98435V20.1704H1.47716V4.82952H3.04534L11.9317 10.2628L20.8181 4.82952H22.3863M22.3863 2.27271H1.47716C0.0265936 2.27271 -1.13647 3.41049 -1.13647 4.82952V20.1704C-1.13647 20.8485 -0.86111 21.4989 -0.370958 21.9784C0.119194 22.4579 0.783982 22.7273 1.47716 22.7273H22.3863C23.0794 22.7273 23.7442 22.4579 24.2344 21.9784C24.7245 21.4989 24.9999 20.8485 24.9999 20.1704V4.82952C24.9999 4.15141 24.7245 3.50108 24.2344 3.02158C23.7442 2.54208 23.0794 2.27271 22.3863 2.27271Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_3388_220">
                                    <rect width="25" height="25" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="text-sm lg:text-base">Email</span>
                    </a>
                    <a href="https://id.linkedin.com/in/hari-maghfiroh-6271a363"
                        target="_blank" rel="noopener noreferrer"
                        class="flex items-center gap-2 py-2 px-5 rounded-3xl border border-[#979797]
                          hover:border-white transition-colors duration-200">
                        <svg width="26" height="26" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26.0197 4.1084C26.7461 4.1084 27.4427 4.39696 27.9564 4.91061C28.47 5.42425 28.7586 6.1209 28.7586 6.84731V26.0197C28.7586 26.7461 28.47 27.4427 27.9564 27.9564C27.4427 28.47 26.7461 28.7586 26.0197 28.7586H6.84731C6.1209 28.7586 5.42425 28.47 4.91061 27.9564C4.39696 27.4427 4.1084 26.7461 4.1084 26.0197V6.84731C4.1084 6.1209 4.39696 5.42425 4.91061 4.91061C5.42425 4.39696 6.1209 4.1084 6.84731 4.1084H26.0197ZM25.3349 25.3349V18.0768C25.3349 16.8928 24.8646 15.7572 24.0273 14.92C23.1901 14.0828 22.0545 13.6124 20.8705 13.6124C19.7065 13.6124 18.3507 14.3245 17.6934 15.3927V13.8726H13.8726V25.3349H17.6934V18.5835C17.6934 17.529 18.5424 16.6663 19.5969 16.6663C20.1054 16.6663 20.5931 16.8683 20.9526 17.2278C21.3122 17.5874 21.5142 18.075 21.5142 18.5835V25.3349H25.3349ZM9.42188 11.7226C10.0321 11.7226 10.6172 11.4802 11.0487 11.0487C11.4802 10.6172 11.7226 10.0321 11.7226 9.42188C11.7226 8.14829 10.6955 7.1075 9.42188 7.1075C8.80807 7.1075 8.2194 7.35134 7.78537 7.78537C7.35134 8.2194 7.1075 8.80807 7.1075 9.42188C7.1075 10.6955 8.14829 11.7226 9.42188 11.7226ZM11.3254 25.3349V13.8726H7.53203V25.3349H11.3254Z"
                                fill="white" />
                        </svg>
                        <span class="text-sm lg:text-base">LinkedIn</span>
                    </a>
                </div>
            </div>
        </div>

        <hr class="border-[#333] mx-6 sm:mx-10 lg:mx-8 mt-8 pb-5">
    </footer>



</body>

<script>
    function formatTanggal(isoString, formatType) {
        const date = new Date(isoString);

        // Mengambil komponen tanggal
        const jam = String(date.getHours()).padStart(2, '0');
        const menit = String(date.getMinutes()).padStart(2, '0');
        const detik = String(date.getSeconds()).padStart(2, '0');
        const tgl = String(date.getDate()).padStart(2, '0');
        const bulan = String(date.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
        const tahun = date.getFullYear();

        if (formatType === 'full') {
            // Hasil: H:i:s d/m/Y
            return `${jam}:${menit}:${detik} ${tgl}/${bulan}/${tahun}`;
        } else {
            // Hasil: H:i d/m (untuk mobile)
            return `${jam}:${menit} ${tgl}/${bulan}`;
        }
    }

    function updateDashboard() {
        // Ganti URL ini dengan endpoint API Anda
        const apiUrl = '/dashboard/lab/data';

        fetch(apiUrl)
            .then(response => response.json())
            .then(json => {
                const data = json.data;

                // Memperbarui nilai teks secara otomatis
                document.getElementById('active_message_title').textContent = data.active_message_title;
                document.getElementById('active_message_subtitle').textContent = data.active_message_subtitle;
                document.getElementById('active_message_button').textContent = data.active_message_button;
                // document.getElementById('status').textContent = data.status;
                document.getElementById('daya').textContent = data.daya;
                document.getElementById('tegangan').textContent = data.tegangan;
                document.getElementById('arus').textContent = data.arus.toFixed(2);
                document.getElementById('max_power').textContent = data.max_power;
                document.getElementById('energi_harian').textContent = data.energi_harian;
                document.getElementById('biaya').textContent = data.biaya.toFixed(2);
                document.getElementById('emisi').textContent = data.emisi.toFixed(2);
                document.getElementById('durasi_pemakaian_harian').textContent = data.durasi_pemakaian_harian;
                document.getElementById('intensitas_cahaya').textContent = (data.intensitas_cahaya / 1000).toFixed(1);
                document.getElementById('intensitas_cahaya_text').textContent = data.intensitas_cahaya;
                document.getElementById('suhu').textContent = data.suhu;
                document.getElementById('suhu_harian').textContent = data.suhu_harian;
                document.getElementById('suhu_mingguan').textContent = data.suhu_mingguan;
                document.getElementById('online_status').textContent = data.online_status;
                document.getElementById('status_message').textContent = data.status_message;
                document.getElementById('created_at_desktop').textContent = formatTanggal(data.created_at, 'full');
                document.getElementById('created_at_mobile').textContent = formatTanggal(data.created_at, 'mobile');
                document.getElementById('durasi_koneksi_j').textContent = data.durasi_koneksi_j;
                document.getElementById('durasi_koneksi_m').textContent = data.durasi_koneksi_m;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Jalankan fungsi saat halaman pertama kali dimuat
    // updateDashboard();

    // Set interval untuk update otomatis setiap 5000ms (5 detik)
    setInterval(updateDashboard, 120000);
</script>

<script>
    const hamburger = document.getElementById('hamburger');
    const sidebar = document.getElementById('sidebar');
    const sidebarClose = document.getElementById('sidebar-close');
    const overlay = document.getElementById('overlay');

    hamburger.addEventListener("click", () => {
        sidebar.classList.add('translate-x-0');
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
    })

    sidebarClose.addEventListener("click", () => {
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    })

    overlay.addEventListener("click", () => {
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    })
</script>

<script>
    // Konfigurasi Chart.js untuk Gauge Chart
    const ctxg = document.getElementById('gaugeChart').getContext('2d');

    const value = document.getElementById('intensitas_cahaya_card').dataset.lux; // Nilai yang ingin ditampilkan
    // Plugin untuk membuat gauge chart
    const gaugeChartText = {
        id: 'gaugeChartText',
        afterDatasetsDraw(chart) {
            // Plugin ini bisa digunakan untuk customisasi tambahan jika diperlukan
        }
    };

    // Membuat segments untuk efek terpotong-potong
    const maxValue = 65535;
    // const tickPositions = [0, 66666, 99999, 133333, 166666, 200000]; // Posisi tick marks
    const tickPositions = [0, maxValue * 0.4, maxValue * 0.55, maxValue * 0.70, maxValue * 0.85, maxValue]; // Posisi tick marks
    const segments = tickPositions.length - 1; // Jumlah segmen antar tick

    const dataArray = [];
    const colorArray = [];

    // Hitung segment mana yang terisi berdasarkan nilai
    for (let i = 0; i < segments; i++) {
        const segmentStart = tickPositions[i];
        const segmentEnd = tickPositions[i + 1];
        const segmentSize = segmentEnd - segmentStart;

        dataArray.push(segmentSize); // Ukuran segment berdasarkan jarak tick

        // Tentukan warna berdasarkan apakah nilai berada di segment ini
        if (value >= segmentEnd) {
            colorArray.push('#f97316'); // Orange penuh jika nilai melebihi segment
        } else if (value > segmentStart) {
            colorArray.push('#f97316'); // Orange jika nilai di dalam segment ini
        } else {
            colorArray.push('#f3f4f6'); // Abu-abu untuk segment kosong
        }
    }

    const data = {
        datasets: [{
            data: dataArray,
            backgroundColor: colorArray,
            borderWidth: 6, // Jarak antar segment
            borderColor: '#ffffff', // Warna pemisah (putih)
            circumference: 270, // 75% lingkaran (270 derajat)
            rotation: 225, // Mulai dari kiri bawah (225 derajat)
            cutout: '85%', // Ketebalan ring
            borderRadius: 15 // Lebih rounded
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            aspectRatio: 2,
            animation: {
                animateRotate: true,
                animateScale: false,
                onComplete: function() {}
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: false
                }
            },
            layout: {
                padding: 0
            }
        },
        plugins: [gaugeChartText]
    };

    // Render chart
    const gaugeChart = new Chart(ctxg, config);

    // Fungsi untuk update nilai (opsional, bisa digunakan untuk data dinamis)
    function updateGaugeValue(newValue) {
        // Update warna segments berdasarkan nilai baru
        const newColors = [];
        for (let i = 0; i < segments; i++) {
            const segmentStart = tickPositions[i];
            const segmentEnd = tickPositions[i + 1];

            if (newValue >= segmentEnd) {
                newColors.push('#f97316'); // Orange penuh
            } else if (newValue > segmentStart) {
                newColors.push('#f97316'); // Orange jika di segment ini
            } else {
                newColors.push('#f3f4f6'); // Abu-abu
            }
        }

        gaugeChart.data.datasets[0].backgroundColor = newColors;
        gaugeChart.update();

        // Update text
        // document.getElementById('intensitas_cahaya').textContent = newValue;

        // Update label berdasarkan nilai
        const label = document.querySelector('.text-lg.text-gray-600');
        if (newValue >= 70) {
            label.textContent = 'Excellent';
        } else if (newValue >= 40) {
            label.textContent = 'Good';
        } else if (newValue >= 20) {
            label.textContent = 'Fair';
        } else {
            label.textContent = 'Poor';
        }
    }
</script>

<script>
    // Fetch data dari API
    async function fetchHeatmapData() {
        try {
            const response = await fetch('/dashboard/lab/heatMap'); // Ganti dengan URL API Anda
            const result = await response.json();

            // Transform data dari API ke format yang dibutuhkan
            const data = result.data.map(item => ({
                date: new Date(item.date),
                temp: parseFloat(item.suhu_harian),
                value: item.value
            }));

            return data;
        } catch (error) {
            console.error('Error fetching heatmap data:', error);
            return [];
        }
    }

    // Fungsi untuk mendapatkan warna berdasarkan suhu
    function getColorByValue(value) {
        if (value === 0) return '#e5e7eb'; // Gray - tidak ada aktivitas
        if (value < 25) return '#86efac'; // Light green
        if (value < 50) return '#4ade80'; // Medium green
        if (value < 75) return '#22c55e'; // Green
        return '#16a34a'; // Dark green
    }

    // Format tanggal ke bahasa Indonesia
    function formatDate(date) {
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        return date.toLocaleDateString('id-ID', options);
    }

    // Render heatmap dots
    async function renderHeatmap() {
        const container = document.getElementById('heatmap-container');

        // Tampilkan loading
        container.innerHTML = '<div class="text-gray-500">Loading data...</div>';

        const data = await fetchHeatmapData();

        if (data.length === 0) {
            container.innerHTML = '<div class="text-red-500">Gagal memuat data</div>';
            return;
        }

        container.innerHTML = data.map((item, index) => {
            const color = getColorByValue(item.value);
            const dateStr = formatDate(item.date);

            return `
                <div 
                    class="w-7 h-7 rounded-full transition-all duration-300 hover:scale-125 cursor-pointer relative group" 
                    style="background-color: ${color}"
                >
                    <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block z-10 w-48">
                        <div class="bg-gray-900 text-white text-xs rounded-lg py-2 px-3 shadow-lg">
                            <div class="font-semibold mb-1">${item.date.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })}</div>
                            <div>Suhu rata-rata: <span class="font-bold">${item.temp}°C</span></div>
                            <div class="absolute top-full left-1/2 transform -translate-x-1/2 -mt-1">
                                <div class="border-4 border-transparent border-t-gray-900"></div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }).join('');
    }

    // Render saat halaman dimuat
    renderHeatmap();

    // Update heatmap setiap 60 detik (opsional)
    // setInterval(renderHeatmap, 60000);
</script>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const dropdownButton = document.getElementById('dropdownNavbarLink');
    const dropdownMenu = document.getElementById('dropdownNavbar');
    const caretIcon = document.getElementById('caretIcon');
    let myChart;

    // Konfigurasi untuk setiap mode
    const modeConfigs = {
        power: {
            title: 'Produksi Energi',
            datasets: [{
                    key: 'daya',
                    label: 'Daya (W)',
                    color: '#03D076'
                },
                {
                    key: 'energi_harian',
                    label: 'Energi (Wh)',
                    color: '#FFC42E'
                }
            ],
            yAxisLabel: 'Daya dan Energi'
        },
        environment: {
            title: 'Kondisi Lingkungan',
            datasets: [{
                    key: 'suhu',
                    label: 'Suhu (°C)',
                    color: '#FFC42E'
                },
                {
                    key: 'intensitas_cahaya',
                    label: 'Intensitas Cahaya (lux)',
                    color: '#03D076'
                }
            ],
            yAxisLabel: 'Suhu dan Intensitas Cahaya'
        }
    };

    // Fungsi untuk format tanggal
    function formatDate(dateString) {
        const date = new Date(dateString);
        const day = date.getDate();
        const month = date.toLocaleString('id-ID', {
            month: 'short'
        });
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        return `${day} ${month} ${hours}:${minutes}`;
    }

    // Fungsi untuk load data dari API
    async function loadChartData(mode) {
        try {
            const response = await fetch(`/dashboard/lab/chart/${mode}`);
            const result = await response.json();

            if (!result.data || result.data.length === 0) {
                console.warn('No data available');
                return;
            }

            const config = modeConfigs[mode];
            const labels = result.data.map(item => formatDate(item.created_at));

            const datasets = config.datasets.map(ds => ({
                label: ds.label,
                data: result.data.map(item => parseFloat(item[ds.key]) || 0),
                backgroundColor: ds.color,
                pointBackgroundColor: 'rgb(255,255,255)',
                pointRadius: 5,
                pointHoverRadius: 7,
                borderColor: ds.color,
                borderWidth: 2,
                tension: 0.3
            }));

            updateChart(labels, datasets, config.yAxisLabel);
        } catch (error) {
            console.error('Error loading chart data:', error);
        }
    }

    // Fungsi untuk update chart
    function updateChart(labels, datasets, yAxisLabel) {
        if (myChart) {
            myChart.destroy();
        }

        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            boxWidth: 8,
                            boxHeight: 8,
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Waktu'
                        },
                        ticks: {
                            callback: function(val, index) {
                                const maxLabels = 6;
                                const step = Math.ceil(this.getLabels().length / maxLabels);
                                return index % step === 0 ? this.getLabelForValue(val) : '';
                            }
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: yAxisLabel
                        }
                    }
                }
            }
        });
    }

    // Toggle dropdown (menggunakan logika Anda)
    dropdownButton.addEventListener('click', function(e) {
        e.stopPropagation();
        // Toggle dropdown visibility
        dropdownMenu.classList.toggle('hidden');

        // Toggle caret rotation
        if (dropdownMenu.classList.contains('hidden')) {
            caretIcon.style.transform = 'rotate(0deg)';
        } else {
            caretIcon.style.transform = 'rotate(180deg)';
        }
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
            caretIcon.style.transform = 'rotate(0deg)';
        }
    });

    // Handle radio button change
    document.querySelectorAll('input[name="mode"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const mode = this.value;
            const config = modeConfigs[mode];

            // Update judul
            document.getElementById('selectedMode').textContent = config.title;

            // Tutup dropdown
            dropdownMenu.classList.add('hidden');
            caretIcon.style.transform = 'rotate(0deg)';

            // Load data baru
            loadChartData(mode);
        });
    });

    // Load initial data (power mode)
    loadChartData('power');
</script>


</html>