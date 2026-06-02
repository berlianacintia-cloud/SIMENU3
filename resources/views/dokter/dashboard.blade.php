@extends('layouts.app')
@section('title', 'Dashboard Dokter')
@section('content')

<div class="p-3 bg-[#F5FAFC] min-h-screen">

   {{-- HEADER --}}
<div class="mb-5">

    <p class="text-gray-500 mt-1 text-base">
        Monitoring data pasien rumah sakit
    </p>

</div>

{{-- HERO --}}
<div class="bg-gradient-to-r from-[#1F516B] to-[#5F91A8]
           rounded-[26px] px-7 py-5 mb-5
            shadow-sm relative overflow-hidden">

    <div class="flex items-center justify-between flex-wrap gap-5">

        <div class="relative z-10">

            <p class="uppercase tracking-[4px]
                      text-white/70 text-[11px]
                      font-semibold mb-3">

                Pelayanan Medis Rumah Sakit

            </p>

            <h1 class="text-3xl font-bold
                       text-white leading-tight">

                Monitoring Data Pasien

            </h1>

            <p class="text-white/80 mt-4 text-base">

                Selamat datang kembali,
                {{ Auth::user()->name }}

            </p>

        </div>

        {{-- CARD TANGGAL --}}
        <div class="bg-white/15 backdrop-blur-md
                    border border-white/20
                    rounded-2xl px-5 py-4">

            <div class="flex items-center gap-3">

                <div class="w-12 h-12 rounded-xl
                            bg-white/20
                            flex items-center justify-center text-2xl">

                    📅

                </div>

                <div>

                    <p class="text-white/70 text-xs">
                        Hari Ini
                    </p>

                    <h2 class="text-2xl font-bold text-white">

                        {{ now()->format('d M Y') }}

                    </h2>

                </div>

            </div>

        </div>

    </div>

    {{-- ORNAMEN --}}
    <div class="absolute -right-10 -top-10
                w-44 h-44 bg-white/10 rounded-full">
    </div>

    <div class="absolute right-16 bottom-[-50px]
                w-32 h-32 bg-white/5 rounded-full">
    </div>

</div>

    {{-- CONTENT --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-3">

        {{-- GRAFIK --}}
        <div class="xl:col-span-2
                    bg-white border border-[#DCE8EC]
                    rounded-3xl p-6 shadow-sm">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <h2 class="text-3xl font-bold text-[#124265]">

                        Grafik Data Pasien

                    </h2>

                </div>

            </div>

            <div class="h-[320px]">
    <canvas id="patientChart"></canvas>
</div>

        </div>

        {{-- AKTIVITAS --}}
        <div class="bg-white border border-[#DCE8EC]
                    rounded-3xl p-6 shadow-sm">

            <h2 class="text-2xl font-bold text-[#124265] mb-5">

                Aktivitas Hari Ini

            </h2>

            <div class="space-y-3">
{{-- ITEM --}}
<div class="bg-[#F6FFF8]
            border border-green-300
            rounded-2xl p-3">

    <div class="flex items-center gap-3">

        <div class="w-12 h-12 rounded-xl
                    bg-green-100
                    flex items-center justify-center text-xl">

            👤

        </div>

        <div>

            <h3 class="font-semibold text-green-700">

                Total Pasien

            </h3>

            <p class="text-gray-500 text-sm">

                {{ $totalPasien }} pasien terdaftar

            </p>

        </div>

    </div>

</div>

               {{-- PASIEN AKTIF --}}
<div class="bg-[#FFF6F6]
            border border-red-200
            rounded-2xl p-3">

    <div class="flex items-center gap-3">

        <div class="w-12 h-12 rounded-xl
                    bg-red-100
                    flex items-center justify-center text-xl">

            🩺

        </div>

        <div>

            <h3 class="font-semibold text-[#124265]">

                Pasien Aktif

            </h3>

            <p class="text-gray-500 text-sm">

                {{ $pasienAktif }} sedang dirawat

            </p>

        </div>

    </div>

</div>

{{-- PASIEN BARU --}}
<div class="bg-[#FFFBEF]
            border border-yellow-200
            rounded-2xl p-3">

    <div class="flex items-center gap-3">

        <div class="w-12 h-12 rounded-xl
                    bg-yellow-100
                    flex items-center justify-center text-xl">

            ➕

        </div>

        <div>

            <h3 class="font-semibold text-[#124265]">

                Pasien Baru

            </h3>

            <p class="text-gray-500 text-sm">

                {{ $pasienBaru }} penambahan hari ini

            </p>

        </div>

    </div>

</div>

            {{-- BUTTON --}}
            <a href="/patients"
               class="mt-6 w-full bg-[#1F516B]
                      hover:bg-[#18445B]
                      transition
                      text-white py-4 rounded-2xl
                      font-semibold flex items-center justify-center gap-2">

                Lihat Data Pasien →

            </a>

        </div>

    </div>

</div>

{{-- CHART --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('patientChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [
            'Total',
            'Aktif',
            'Baru'
        ],

        datasets: [{

    label: 'Data Pasien',

    data: [
        {{ $totalPasien }},
        {{ $pasienAktif }},
        {{ $pasienBaru }}
    ],

    backgroundColor: [
        '#1F516B',
        '#5F91A8',
        '#89AFC2'
    ],

    borderRadius: 14,
    borderSkipped: false,

    barThickness: 900,
    maxBarThickness: 110,
    categoryPercentage: 0.9,
    barPercentage: 0.9

}]
    },

    options: {

        responsive: true,
        maintainAspectRatio: false,

        plugins: {

            legend: {
                display: false
            }

        },

        scales: {

            y: {

                beginAtZero: true,

                grid: {
                    color: '#EEF4F5'
                },

                ticks: {
                    stepSize: 1
                }

            },

            x: {

                grid: {
                    display: false
                }

            }

        }

    }

});

</script>

@endsection