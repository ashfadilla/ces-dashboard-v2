<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Monitoring Jamur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-[#F4F7F3] text-[#383838]">

    {{-- ===================== SIDEBAR ===================== --}}
    <aside id="overlay" class="hidden fixed inset-0 z-10 bg-gray-600 opacity-40 cursor-pointer"></aside>

    <aside id="sidebar"
        class="fixed transform -translate-x-full left-0 top-0 w-full lg:w-94 h-screen bg-[#FFFFF0] shadow-2xl z-30 text-xl overflow-y-auto">
        <div class="flex items-center justify-between mb-10 mt-8 mx-7">
            <div>
                <h1>CES</h1>
                <p class="text-base text-gray-400">Control Energy System</p>
            </div>
            <button id="sidebar-close" type="button" class="cursor-pointer px-3 py-2 hover:bg-[#F4F7F3] rounded-full">✕</button>
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

    {{-- ===================== KONTEN ===================== --}}
    <main class="lg:px-28 px-6 lg:pt-12 pt-8">

        {{-- Header --}}
        <section class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-6">
                <button id="hamburger" class="text-3xl">☰</button>
                <div>
                    <h1 class="text-2xl font-semibold">Dashboard Monitoring Jamur</h1>
                    <p class="text-gray-500">Pantau suhu, kelembaban, dan status pengabutan secara real-time.</p>
                </div>
            </div>
        </section>

        {{-- Status koneksi --}}
        <div class="bg-[#FFFFF0] rounded-2xl p-5 mb-6 flex items-center gap-3">
            <span id="online-dot" class="w-3 h-3 rounded-full bg-gray-400"></span>
            <div>
                <p id="online-status" class="font-semibold">Memuat...</p>
                <p id="status-message" class="text-sm text-gray-500">Mengambil data terbaru</p>
            </div>
        </div>

        {{-- Kartu-kartu data --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Suhu --}}
            <div class="bg-[#FFFFF0] rounded-2xl p-6">
                <h2 class="text-gray-500 mb-2">Suhu Rata-rata</h2>
                <p class="text-4xl font-bold"><span id="suhu-rata">0.0</span> °C</p>
                <hr class="my-4 text-gray-200">
                <div class="text-sm text-gray-600 space-y-1">
                    <div class="flex justify-between"><span>Node 1</span><span id="suhu1">0.0 °C</span></div>
                    <div class="flex justify-between"><span>Node 2</span><span id="suhu2">0.0 °C</span></div>
                </div>
            </div>

            {{-- Kelembaban --}}
            <div class="bg-[#FFFFF0] rounded-2xl p-6">
                <h2 class="text-gray-500 mb-2">Kelembaban Rata-rata</h2>
                <p class="text-4xl font-bold"><span id="lembab-rata">0</span> %</p>
                <hr class="my-4 text-gray-200">
                <div class="text-sm text-gray-600 space-y-1">
                    <div class="flex justify-between"><span>Node 1</span><span id="lembab1">0 %</span></div>
                    <div class="flex justify-between"><span>Node 2</span><span id="lembab2">0 %</span></div>
                </div>
            </div>

            {{-- Pengabutan --}}
            <div class="bg-[#FFFFF0] rounded-2xl p-6">
                <h2 class="text-gray-500 mb-2">Status Pengabutan</h2>
                <p id="relay-text" class="text-3xl font-bold">Mati</p>
                <hr class="my-4 text-gray-200">
                <div class="text-sm text-gray-600 flex justify-between">
                    <span>Mode</span><span id="mode" class="capitalize">-</span>
                </div>
            </div>
        </div>
    </main>

    {{-- ===================== SCRIPT ===================== --}}
    <script>
        // Buka/tutup sidebar
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

        // Ambil data terbaru dari endpoint controller lalu isi ke halaman
        async function updateDashboard() {
            try {
                const res = await fetch("{{ url('dashboard/jamur/data') }}");
                const json = await res.json();
                const d = json.data;
                if (!d) return;

                document.getElementById('suhu-rata').textContent   = d.suhu_rata ?? '0.0';
                document.getElementById('suhu1').textContent        = (d.suhu_node1 ?? '-') + ' °C';
                document.getElementById('suhu2').textContent        = (d.suhu_node2 ?? '-') + ' °C';
                document.getElementById('lembab-rata').textContent  = d.kelembaban_rata ?? '0';
                document.getElementById('lembab1').textContent      = (d.kelembaban_node1 ?? '-') + ' %';
                document.getElementById('lembab2').textContent      = (d.kelembaban_node2 ?? '-') + ' %';
                document.getElementById('relay-text').textContent   = d.relay_text ?? 'Mati';
                document.getElementById('mode').textContent         = d.mode ?? '-';

                document.getElementById('online-status').textContent  = d.online_status ?? '-';
                document.getElementById('status-message').textContent = d.status_message ?? '';
                const dot = document.getElementById('online-dot');
                dot.className = 'w-3 h-3 rounded-full ' +
                    (d.online_status === 'Online' ? 'bg-green-500' : 'bg-red-500');
            } catch (e) {
                console.error('Gagal memuat data:', e);
            }
        }

        updateDashboard();
        setInterval(updateDashboard, 5000); // perbarui tiap 5 detik
    </script>
</body>

</html>
