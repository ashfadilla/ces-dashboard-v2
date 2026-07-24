<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Monitoring Jamur</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="lg:px-28 px-6 lg:pt-12 pt-8 bg-[#F4F7F3]">

    {{-- ===================== SIDEBAR ===================== --}}
    <aside id="overlay" class="hidden fixed inset-0 z-10 bg-gray-600 opacity-40 cursor-pointer"></aside>

    <aside id="sidebar"
        class="fixed transform -translate-x-full left-0 top-0 w-full lg:w-94 h-screen bg-[#FFFFF0] shadow-2xl z-30 text-xl text-[#383838] overflow-y-auto transition-transform duration-300">
        <div class="flex items-center justify-between mb-10 mt-8 mx-7">
            <div>
                <h1>CES</h1>
                <p class="text-base text-gray-400">Control Energy System</p>
            </div>
            <button id="sidebar-close" type="button" class="cursor-pointer px-3 py-2 hover:bg-[#F4F7F3] rounded-full">&times;</button>
        </div>
        <hr class="my-7 text-gray-300">
        <div class="px-11">
            <h1 class="mb-2">Dashboard</h1>
            <a href="{{ route('dashboard.living-lab') }}">
                <div class="flex items-center gap-4 p-2 m-2 rounded-xl hover:bg-gray-200"><h1>Living Lab</h1></div>
            </a>
            <a href="{{ route('dashboard.lab-scale') }}">
                <div class="flex items-center gap-4 p-2 m-2 rounded-xl hover:bg-gray-200"><h1>Lab Scale</h1></div>
            </a>
            <a href="{{ route('dashboard.jamur') }}">
                <div class="flex items-center gap-4 p-2 m-2 rounded-xl bg-gray-200"><h1>Jamur</h1></div>
            </a>
        </div>
    </aside>

    {{-- ===================== HEADER ===================== --}}
    <section class="flex items-center justify-between">
        <div class="flex items-center gap-8">
            <button type="button" id="hamburger" class="cursor-pointer hover:bg-gray-200 rounded-full px-2 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                </svg>
            </button>
            <div class="flex items-center gap-4">
                <div class="p-3 bg-[#62A19E] rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" viewBox="0 0 16 16">
                        <path d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6M6.646 4.646l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448c.82-1.641 1.717-2.753 2.093-3.13"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl text-[#383838]">Dashboard Monitoring <span class="hidden lg:inline-block">Kumbung Jamur</span></h1>
                    <h2 class="text-sm lg:text-lg text-gray-500">Pantau suhu, kelembaban, dan waktu penyemprotan.</h2>
                </div>
            </div>
        </div>

        <button type="button" id="btn-export-toggle"
            class="text-[#FFFFF0] text-xl px-4 py-2 bg-[#4CAF50] rounded-2xl hidden lg:inline-block cursor-pointer hover:bg-[#43a047] transition-colors">
            <div class="flex items-center gap-3">
                <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.5 18L7.875 12.375L9.45 10.7437L12.375 13.6687V4.5H14.625V13.6687L17.55 10.7437L19.125 12.375L13.5 18ZM6.75 22.5C6.13125 22.5 5.60175 22.2799 5.1615 21.8396C4.72125 21.3994 4.50075 20.8695 4.5 20.25V16.875H6.75V20.25H20.25V16.875H22.5V20.25C22.5 20.8687 22.2799 21.3986 21.8396 21.8396C21.3994 22.2806 20.8695 22.5007 20.25 22.5H6.75Z" fill="white"/>
                </svg>
                <h1>Export</h1>
            </div>
        </button>
    </section>

    {{-- ===================== PANEL EXPORT (rentang tanggal) ===================== --}}
    <section id="panel-export" class="hidden my-5 rounded-2xl bg-[#FFFFF0] p-6 lg:p-7">
        <h3 class="text-[#383838] font-semibold mb-1">Unduh Data (CSV)</h3>
        <p class="text-sm text-[#979797] mb-5">Kosongkan tanggal untuk mengunduh seluruh data.</p>

        <div class="flex flex-col sm:flex-row sm:items-end gap-4">
            <div class="flex-1">
                <label class="block text-sm text-[#979797] mb-1">Dari tanggal</label>
                <input type="date" id="tgl-mulai"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-[#383838] bg-white">
            </div>
            <div class="flex-1">
                <label class="block text-sm text-[#979797] mb-1">Sampai tanggal</label>
                <input type="date" id="tgl-akhir"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-[#383838] bg-white">
            </div>
            <button type="button" id="btn-unduh"
                class="shrink-0 bg-[#4CAF50] hover:bg-[#43a047] text-[#FFFFF0] rounded-lg px-6 py-2.5 font-semibold cursor-pointer transition-colors">
                Unduh
            </button>
        </div>
    </section>

    {{-- ===================== BAR STATUS ===================== --}}
    <section class="my-7 rounded-2xl bg-[#FFFFF0] overflow-hidden">
        {{-- baris 1: koneksi alat --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-6 px-7 border-b border-slate-100">
            <div class="flex items-center gap-4">
                <div id="online-dot" class="w-2.5 h-2.5 rounded-full shrink-0 bg-slate-300 ring-4 ring-slate-300/30"></div>
                <div class="flex flex-col">
                    <h3 id="online-status" class="text-sm font-semibold text-slate-800 leading-tight">Memuat...</h3>
                    <p id="status-message" class="text-xs text-slate-500 mt-1">Mengambil data terbaru</p>
                </div>
            </div>
            <p class="text-xs text-slate-500">Diperbarui: <span id="waktu-update" class="font-semibold text-slate-700">-</span></p>
        </div>

        {{-- baris 2: kondisi kumbung --}}
        <div class="flex flex-col md:flex-row">
            <div class="flex items-center gap-3 py-4 px-5 lg:px-6 md:w-52 shrink-0 border-b md:border-b-0 md:border-r border-slate-100 bg-slate-50/50">
                <div id="kondisi-dot" class="w-2.5 h-2.5 rounded-full shrink-0 bg-slate-300 ring-4 ring-slate-300/20"></div>
                <span id="kondisi-label" class="text-xs font-bold uppercase tracking-widest text-slate-400">-</span>
            </div>
            <div class="flex-1 py-4 px-5 lg:px-6 flex flex-col justify-center">
                <p id="kondisi-judul" class="text-sm font-semibold text-slate-800 mb-1">Menunggu data</p>
                <p id="kondisi-detail" class="text-xs text-slate-500">Belum ada pembacaan dari alat</p>
            </div>
        </div>
    </section>

    {{-- ===================== KARTU ===================== --}}
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-5 text-[#979797] pb-12">

        {{-- Suhu --}}
        <div class="bg-[#FFFFF0] rounded-[20px] p-10">
            <div class="block lg:flex items-center justify-between mb-6 text-gray-800">
                <div class="flex items-center gap-4 text-xl">
                    <div class="p-3 bg-[#62A19E] rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" viewBox="0 0 16 16">
                            <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415"/>
                            <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.334 0l-.167-.15V2.5A1.5 1.5 0 0 0 8 1"/>
                        </svg>
                    </div>
                    <h1>Suhu <br> Ruangan</h1>
                </div>
                <h1 class="text-xl mx-auto w-fit mt-4 lg:mt-0 lg:mx-0"><span id="suhu" class="text-4xl">0.0</span> &deg;C</h1>
            </div>
            <hr class="my-4">
            <div class="flex justify-between">
                <h1>Status</h1>
                <h1 id="suhu-status" class="font-semibold">-</h1>
            </div>
            <div class="flex justify-between">
                <h1>Rentang ideal</h1>
                <h1>22 &ndash; 28 &deg;C</h1>
            </div>
        </div>

        {{-- Kelembaban --}}
        <div class="bg-[#FFFFF0] rounded-[20px] p-10">
            <div class="block lg:flex items-center justify-between mb-6 text-gray-800">
                <div class="flex items-center gap-4 text-xl">
                    <div class="p-3 bg-[#62A19E] rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" viewBox="0 0 16 16">
                            <path d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6M6.646 4.646l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448c.82-1.641 1.717-2.753 2.093-3.13"/>
                        </svg>
                    </div>
                    <h1>Kelembaban <br> Udara</h1>
                </div>
                <h1 class="text-xl mx-auto w-fit mt-4 lg:mt-0 lg:mx-0"><span id="rh" class="text-4xl">0</span> %</h1>
            </div>
            <hr class="my-4">
            <div class="flex justify-between">
                <h1>Status</h1>
                <h1 id="rh-status" class="font-semibold">-</h1>
            </div>
            <div class="flex justify-between">
                <h1>Rentang ideal</h1>
                <h1>80 &ndash; 90 %</h1>
            </div>
        </div>

        {{-- Penyemprotan --}}
        <div class="bg-[#FFFFF0] rounded-[20px] p-10">
            <div class="flex items-center gap-4 text-xl text-gray-800">
                <div class="p-3 bg-[#62A19E] rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" viewBox="0 0 16 16">
                        <path d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6"/>
                    </svg>
                </div>
                <h1>Penyemprotan</h1>
            </div>

            <h1 id="saran" class="text-3xl text-gray-900 my-7 text-center font-semibold">-</h1>
            <p id="saran-detail" class="text-center text-sm">Menunggu data dari alat</p>

            <hr class="my-4">
            <p class="text-xs text-center">Penyemprotan dilakukan manual. Sistem hanya memberi saran.</p>
        </div>

        {{-- ===== GRAFIK ===== --}}
        <div class="bg-[#FFFFF0] rounded-[20px] p-8 lg:p-10 lg:col-span-2">
            <div class="flex items-center gap-4 text-xl text-gray-800 mb-6">
                <div class="p-3 bg-[#62A19E] rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" viewBox="0 0 16 16">
                        <path d="M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-gray-900">Grafik Suhu &amp; Kelembaban</h1>
                    <h2 class="text-sm text-[#979797]">Data hari terakhir</h2>
                </div>
            </div>
            <div class="relative" style="height: 340px;">
                <canvas id="grafikJamur"></canvas>
            </div>
        </div>

        {{-- ===== LOKASI ===== --}}
        <div class="bg-[#FFFFF0] rounded-[20px] p-8 lg:p-10">
            <div class="flex items-center gap-4 text-xl text-gray-800 mb-5">
                <div class="p-3 bg-[#62A19E] rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                    </svg>
                </div>
                <h1 class="text-gray-900">Lokasi Kumbung</h1>
            </div>

            <div class="w-full rounded-xl overflow-hidden mb-4">
                <iframe
                    src="https://www.google.com/maps?q=GW76%2BV38+Sidodadi+Masaran+Sragen+Jawa+Tengah&z=16&output=embed"
                    width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <p class="text-sm leading-relaxed">
                GW76+V38, Kds II, Sidodadi,<br>
                Kec. Masaran, Kabupaten Sragen,<br>
                Jawa Tengah 57282
            </p>
        </div>
    </section>

    {{-- ===================== SCRIPT ===================== --}}
    <script>
        // ---- Sidebar ----
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        document.getElementById('hamburger').addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        });
        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }
        document.getElementById('sidebar-close').addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);

        // ---- Panel export ----
        document.getElementById('btn-export-toggle').addEventListener('click', () => {
            document.getElementById('panel-export').classList.toggle('hidden');
        });

        document.getElementById('btn-unduh').addEventListener('click', () => {
            const mulai = document.getElementById('tgl-mulai').value;
            const akhir = document.getElementById('tgl-akhir').value;

            let url = "{{ url('dashboard/jamur/export') }}";
            const p = [];
            if (mulai) p.push('start=' + mulai);
            if (akhir) p.push('end=' + akhir);
            if (p.length) url += '?' + p.join('&');

            window.location.href = url;
        });

        // ---- Warna status (senada palet CES) ----
        const TEKS = {
            hijau:  'text-[#22c55e]', oranye: 'text-orange-500',
            merah:  'text-red-500',   biru:   'text-blue-500',   abu: 'text-slate-400'
        };
        const DOT = {
            hijau:  'bg-[#22c55e] ring-[#22c55e]/20', oranye: 'bg-orange-500 ring-orange-500/20',
            merah:  'bg-red-500 ring-red-500/20',     biru:   'bg-blue-500 ring-blue-500/20',
            abu:    'bg-slate-300 ring-slate-300/20'
        };

        async function updateDashboard() {
            try {
                const res  = await fetch("{{ url('dashboard/jamur/data') }}");
                const json = await res.json();
                const d = json.data;
                if (!d) return;

                // Angka utama
                document.getElementById('suhu').textContent = d.suhu_node1 ?? '-';
                document.getElementById('rh').textContent   = d.kelembaban_node1 ?? '-';

                // Status di kartu
                const sEl = document.getElementById('suhu-status');
                sEl.textContent = d.suhu_status ?? '-';
                sEl.className   = 'font-semibold ' + (TEKS[d.suhu_warna] || TEKS.abu);

                const rEl = document.getElementById('rh-status');
                rEl.textContent = d.rh_status ?? '-';
                rEl.className   = 'font-semibold ' + (TEKS[d.rh_warna] || TEKS.abu);

                // Kartu penyemprotan
                const saranEl = document.getElementById('saran');
                saranEl.textContent = d.saran ?? '-';
                saranEl.className   = 'text-3xl my-7 text-center font-semibold ' + (TEKS[d.saran_warna] || TEKS.abu);
                document.getElementById('saran-detail').textContent = d.saran_detail ?? '';

                // Bar kondisi
                const warnaKondisi = d.kondisi_ideal ? 'hijau' : (d.saran_warna || 'oranye');
                document.getElementById('kondisi-dot').className =
                    'w-2.5 h-2.5 rounded-full shrink-0 ring-4 ' + (DOT[warnaKondisi] || DOT.abu);
                const labelEl = document.getElementById('kondisi-label');
                labelEl.textContent = d.kondisi_ideal ? 'Normal' : 'Perhatian';
                labelEl.className   = 'text-xs font-bold uppercase tracking-widest ' + (TEKS[warnaKondisi] || TEKS.abu);

                document.getElementById('kondisi-judul').textContent =
                    d.kondisi_ideal ? 'Kondisi kumbung ideal untuk jamur' : 'Kondisi kumbung perlu perhatian';
                document.getElementById('kondisi-detail').textContent = d.saran_detail ?? '';

                // Koneksi alat
                document.getElementById('online-status').textContent  = d.online_status ?? '-';
                document.getElementById('status-message').textContent = d.status_message ?? '';
                document.getElementById('waktu-update').textContent   = d.waktu_update ?? '-';
                document.getElementById('online-dot').className =
                    'w-2.5 h-2.5 rounded-full shrink-0 ring-4 ' +
                    (d.online_status === 'Online' ? DOT.hijau : DOT.merah);

            } catch (e) {
                console.error('Gagal memuat data:', e);
            }
        }

        // ---- Grafik suhu & kelembaban ----
        let grafik;
        async function muatGrafik() {
            try {
                const res  = await fetch("{{ url('dashboard/jamur/chart/semua') }}");
                const json = await res.json();
                const rows = json.data || [];
                if (!rows.length) return;

                const label = rows.map(r => {
                    const t = new Date(r.created_at);
                    return String(t.getHours()).padStart(2,'0') + ':' + String(t.getMinutes()).padStart(2,'0');
                });

                const dataSuhu = rows.map(r => parseFloat(r.suhu_node1) || null);
                const dataRh   = rows.map(r => parseFloat(r.kelembaban_node1) || null);

                if (grafik) grafik.destroy();

                grafik = new Chart(document.getElementById('grafikJamur'), {
                    type: 'line',
                    data: {
                        labels: label,
                        datasets: [
                            {
                                label: 'Suhu (\u00B0C)', data: dataSuhu, yAxisID: 'y',
                                borderColor: '#FFC42E', backgroundColor: '#FFC42E',
                                pointBackgroundColor: '#fff', pointRadius: 3, borderWidth: 2, tension: 0.3
                            },
                            {
                                label: 'Kelembaban (%)', data: dataRh, yAxisID: 'y1',
                                borderColor: '#03D076', backgroundColor: '#03D076',
                                pointBackgroundColor: '#fff', pointRadius: 3, borderWidth: 2, tension: 0.3
                            }
                        ]
                    },
                    options: {
                        responsive: true, maintainAspectRatio: false,
                        interaction: { intersect: false, mode: 'index' },
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: { usePointStyle: true, pointStyle: 'circle', boxWidth: 8, boxHeight: 8 }
                            }
                        },
                        scales: {
                            x: { title: { display: true, text: 'Waktu' },
                                 ticks: { maxTicksLimit: 8 } },
                            y:  { position: 'left',  title: { display: true, text: 'Suhu (\u00B0C)' } },
                            y1: { position: 'right', title: { display: true, text: 'Kelembaban (%)' },
                                  grid: { drawOnChartArea: false } }
                        }
                    }
                });
            } catch (e) {
                console.error('Gagal memuat grafik:', e);
            }
        }

        updateDashboard();
        muatGrafik();
        setInterval(updateDashboard, 5000);
        setInterval(muatGrafik, 60000);
    </script>
</body>

</html>
