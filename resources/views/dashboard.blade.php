@section('title', 'Dashboard')
@extends('layouts.app')

@section('content')

<div class="flex gap-6">

    <!-- LEFT CONTENT -->
    <div class="flex-1 space-y-6">

        <!-- STATISTIC -->
        <div class="bg-[#EEF4F5] rounded-3xl p-5 shadow-sm">

            <div class="grid grid-cols-3 gap-4">

                <!-- CARD 1 -->
                <div class="bg-[#F1FBF2] border border-green-300 rounded-2xl p-4">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl">
                            👤
                        </div>

                        <div>

                            <h1 class="font-bold text-green-700 text-sm">
                                Total Pasien Hari Ini
                            </h1>

                            <h2 class="text-3xl font-bold">
                                128
                            </h2>

                            <p class="text-gray-500 text-sm">
                                Pasien
                            </p>

                        </div>

                    </div>

                </div>

                <!-- CARD 2 -->
                <div class="bg-[#FFFBEF] border border-yellow-300 rounded-2xl p-4">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-yellow-100 flex items-center justify-center text-2xl">
                            🍱
                        </div>

                        <div>

                            <h1 class="font-bold text-yellow-700 text-sm">
                                Total Menu Aktif
                            </h1>

                            <h2 class="text-3xl font-bold">
                                128
                            </h2>

                            <p class="text-gray-500 text-sm">
                                Menu
                            </p>

                        </div>

                    </div>

                </div>

                <!-- CARD 3 -->
                <div class="bg-[#F2F5FF] border border-blue-300 rounded-2xl p-4">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">
                            🚚
                        </div>

                        <div>

                            <h1 class="font-bold text-blue-700 text-sm">
                                Distribusi Hari Ini
                            </h1>

                            <h2 class="text-3xl font-bold">
                                128
                            </h2>

                            <p class="text-gray-500 text-sm">
                                Distribusi
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- ABOUT -->
        <div class="bg-[#FFF1F1] rounded-2xl p-6 shadow-sm">

            <h1 class="text-3xl font-bold text-[#D27D7D] mb-4">
                Tentang Sistem
            </h1>

            <p class="text-gray-600 text-[15px] leading-relaxed">

                SIMENU adalah Sistem Informasi Pengelolaan Menu pasien
                terintegrasi, memfasilitasi kolaborasi dari Dokter,
                Ahli Gizi, hingga Petugas Dapur untuk standar asuhan gizi terbaik.

            </p>

        </div>

        <!-- CHART -->
        <div class="bg-white rounded-3xl shadow-sm p-5">

            <h1 class="text-3xl font-bold text-[#1F516B] mb-6">

                Grafik Distribusi

            </h1>

            <canvas id="distributionChart" height="100"></canvas>

        </div>

    </div>

    <!-- RIGHT SIDEBAR -->
    <div class="w-[300px] space-y-6">

        <!-- CALENDAR -->
        <div class="bg-white rounded-3xl shadow-sm p-6">

            <div class="flex items-center gap-4 mb-6">

                <div class="w-16 h-16 rounded-2xl bg-cyan-100 flex items-center justify-center text-3xl">
                    📅
                </div>

                <div>

                    <h1 class="text-2xl font-bold text-[#1F516B]">
                        {{ now()->translatedFormat('l') }}
                    </h1>

                    <p class="text-gray-500">
                        {{ now()->translatedFormat('d F Y') }}
                    </p>

                </div>

            </div>

            <div class="bg-[#F7FAFC] rounded-2xl p-5 text-center">

                <h1 class="text-6xl font-bold text-[#1F516B]">
                    {{ now()->format('d') }}
                </h1>

                <p class="text-gray-500 mt-2">
                    Hari Ini
                </p>

            </div>

        </div>

        <!-- AKTIVITAS ADMIN -->
        <div class="bg-[#EAF2F5] rounded-3xl shadow-sm p-6">

            <h1 class="text-3xl font-bold text-[#5F91A8] mb-5">

                Aktivitas Admin

            </h1>

            <div class="space-y-4">

                @forelse($activities as $activity)

                    <div class="bg-white rounded-2xl p-4 shadow-sm">

                        <div class="flex items-start gap-3">

                            <div class="text-lg">
                                ✔
                            </div>

                            <div>

                                <p class="font-medium text-gray-700">
                                    {{ $activity->activity }}
                                </p>

                                <p class="text-sm text-gray-400 mt-1">
                                    {{ $activity->created_at->diffForHumans() }}
                                </p>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="bg-white rounded-2xl p-4 shadow-sm">

                        Belum ada aktivitas.

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('distributionChart');

new Chart(ctx, {
    type: 'bar',

    data: {
        labels: ['Pagi', 'Siang', 'Malam'],

        datasets: [{
            label: 'Distribusi Hari Ini',

            data: [12, 19, 8],

            backgroundColor: [
                '#1F516B',
                '#5F91A8',
                '#89AFC2'
            ],

            borderRadius: 12
        }]
    },

    options: {
        responsive: true,

        plugins: {
            legend: {
                display: true
            }
        }
    }
});
</script>

@endsection