@extends('layouts.app')
@section('title', 'Dashboard Petugas Dapur')
@section('content')

<div class="p-3 bg-[#F5FAFC] min-h-screen overflow-hidden">

{{-- HEADER --}}
<div class="mb-5">

    <p class="text-gray-500 mt-1 text-base">
        Monitoring produksi & distribusi menu pasien
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

                Produksi Makanan Rumah Sakit

            </p>

            <h1 class="text-3xl font-bold
                       text-white leading-tight">

                Monitoring Produksi & Distribusi Menu

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
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

        {{-- GRAFIK --}}
        <div class="lg:col-span-2
                    bg-white border border-[#DCE8EC]
                    rounded-3xl p-5 shadow-sm">

            <div class="mb-4">

                <h2 class="text-2xl font-bold text-[#124265]">
                    Grafik Distribusi
                </h2>

                <p class="text-gray-500 text-sm mt-1">
                    Distribusi menu pasien hari ini
                </p>

            </div>

            <div class="h-[300px]">

                <canvas id="distributionChart"></canvas>

            </div>

        </div>

       {{-- MENU AKSES --}}
<div class="bg-white border border-[#DCE8EC]
            rounded-3xl p-5 shadow-sm">

    <h2 class="text-2xl font-bold text-[#124265] mb-4">
        Aktivitas Produksi
    </h2>

    <div class="space-y-3">

        {{-- TOTAL MENU --}}
        <div class="bg-[#F5FAFC]
                    border border-[#DCE8EC]
                    rounded-2xl p-3">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl
                                bg-[#DDF2F7]
                                flex items-center justify-center text-lg">

                        🍽️

                    </div>

                    <div>

                        <h3 class="font-semibold text-[#124265]">
                            Total Menu
                        </h3>

                        <p class="text-gray-500 text-sm">
                            Menu pasien hari ini
                        </p>

                    </div>

                </div>

                <h2 class="text-2xl font-bold text-[#124265]">
                    {{ $totalMenu }}
                </h2>

            </div>

        </div>

        {{-- DIPROSES --}}
        <div class="bg-[#FFF6F6]
                    border border-red-300
                    rounded-2xl p-3">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl
                                bg-red-100
                                flex items-center justify-center text-lg">

                        👨‍🍳

                    </div>

                    <div>

                        <h3 class="font-semibold text-red-700">
                            Dimasak
                        </h3>

                        <p class="text-gray-500 text-sm">
                            Masih di dapur
                        </p>

                    </div>

                </div>

                <h2 class="text-2xl font-bold text-[#124265]">
                    {{ $menuDiproses }}
                </h2>

            </div>

        </div>

        {{-- DISTRIBUSI --}}
        <div class="bg-[#FFFBEF]
                    border border-yellow-300
                    rounded-2xl p-3">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl
                                bg-yellow-100
                                flex items-center justify-center text-lg">

                        🚚

                    </div>

                    <div>

                        <h3 class="font-semibold text-yellow-700">
                            Distribusi
                        </h3>

                        <p class="text-gray-500 text-sm">
                            Siap dikirim
                        </p>

                    </div>

                </div>

                <h2 class="text-2xl font-bold text-[#124265]">
                    {{ $menuSelesai }}
                </h2>

            </div>

        </div>

        {{-- LABEL --}}
        <div class="bg-[#F6FFF8]
                    border border-green-300
                    rounded-2xl p-3">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl
                                bg-green-100
                                flex items-center justify-center text-lg">

                        🖨️

                    </div>

                    <div>

                        <h3 class="font-semibold text-green-700">
                            Label Cetak
                        </h3>

                        <p class="text-gray-500 text-sm">
                            Label makanan
                        </p>

                    </div>

                </div>

                <h2 class="text-2xl font-bold text-[#124265]">
                    {{ $labelDicetak }}
                </h2>

            </div>

        </div>

    </div>

</div>

{{-- CHART --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('distributionChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: ['Pagi', 'Siang', 'Malam'],

        datasets: [{

            data: [
                {{ $grafikDistribusi[0] }},
                {{ $grafikDistribusi[1] }},
                {{ $grafikDistribusi[2] }}
            ],

            backgroundColor: [
                '#1F516B',
                '#5F91A8',
                '#89AFC2'
            ],

            borderRadius: 14,
            borderSkipped: false,
            barThickness: 95,
            maxBarThickness: 110

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