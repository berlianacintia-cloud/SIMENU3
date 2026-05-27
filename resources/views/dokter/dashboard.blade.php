@extends('layouts.app')

@section('title', 'Dashboard Dokter')

@section('content')

<div class="space-y-6">

    {{-- HERO SECTION --}}
    <div class="relative overflow-hidden rounded-[30px]
        bg-gradient-to-r from-[#2B5D76] to-[#4B89A5]
        p-7 shadow-md">

        {{-- BACKGROUND ICON --}}
        <div class="absolute right-0 top-0 opacity-10">

            <i class="fa-solid fa-stethoscope text-[170px]"></i>

        </div>

        <div class="relative z-10 flex items-center justify-between">

            <div>

                <p class="uppercase tracking-[3px]
                    text-xs text-white/80 font-medium">

                    Pelayanan Medis Rumah Sakit

                </p>

                <h1 class="text-3xl font-bold mt-3
                    text-white leading-tight">

                    Monitoring Data Pasien & Laporan Medis

                </h1>

                <p class="mt-4 text-white/90">

                    Selamat datang kembali,
                    <span class="font-semibold">
                        dr. {{ auth()->user()->name }}
                    </span>

                </p>

            </div>

            {{-- DATE --}}
            <div class="hidden md:flex">

                <div class="bg-white/15 backdrop-blur-md
                    px-5 py-4 rounded-2xl border border-white/20">

                    <p class="text-xs text-white/70">
                        Tanggal Hari Ini
                    </p>

                    <h2 class="text-lg font-bold text-white mt-1">
                        {{ date('d M Y') }}
                    </h2>

                </div>

            </div>

        </div>

    </div>

    {{-- QUICK MENU --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        {{-- DATA PASIEN --}}
        <a href="/dokter/data-pasien"
           class="bg-[#F9FCFD] rounded-3xl p-6
           border border-[#D7E5EC]
           shadow-sm hover:shadow-md
           transition-all duration-300">

            <div class="flex items-center justify-between">

                <div>

                    <div class="w-14 h-14 rounded-2xl
                        bg-[#EDF6FA]
                        flex items-center justify-center mb-5">

                        <i class="fa-solid fa-user-injured
                            text-[#2B5D76] text-2xl"></i>

                    </div>

                    <h2 class="text-xl font-bold text-[#2B5D76]">
                        Data Pasien
                    </h2>

                    <p class="text-gray-500 text-sm mt-2">
                        Lihat seluruh data pasien
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                    bg-[#EDF6FA]
                    flex items-center justify-center">

                    <i class="fa-solid fa-arrow-right
                        text-[#2B5D76]"></i>

                </div>

            </div>

        </a>

        {{-- LAPORAN --}}
        <a href="/dokter/laporan"
           class="bg-[#F9FCFD] rounded-3xl p-6
           border border-[#D7E5EC]
           shadow-sm hover:shadow-md
           transition-all duration-300">

            <div class="flex items-center justify-between">

                <div>

                    <div class="w-14 h-14 rounded-2xl
                        bg-[#EEF8FB]
                        flex items-center justify-center mb-5">

                        <i class="fa-solid fa-file-medical
                            text-[#4B89A5] text-2xl"></i>

                    </div>

                    <h2 class="text-xl font-bold text-[#2B5D76]">
                        Laporan
                    </h2>

                    <p class="text-gray-500 text-sm mt-2">
                        Lihat laporan pasien
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                    bg-[#EEF8FB]
                    flex items-center justify-center">

                    <i class="fa-solid fa-arrow-right
                        text-[#4B89A5]"></i>

                </div>

            </div>

        </a>

    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

        {{-- TOTAL PASIEN --}}
        <div class="bg-[#EDF6FA]
            border border-[#B7D4E5]
            rounded-3xl p-6 shadow-sm
            hover:shadow-md transition">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-[#4E6B7B] font-medium">
                        Total Pasien
                    </p>

                    <h2 class="text-4xl font-bold
                        text-[#2B5D76] mt-3">

                       23

                    </h2>

                    <p class="text-sm text-[#6C8795] mt-2">
                        Data pasien aktif
                    </p>

                </div>

                <div class="w-16 h-16 rounded-2xl
                    bg-[#DCECF5]
                    flex items-center justify-center">

                    <i class="fa-solid fa-user-injured
                        text-[#2B5D76] text-2xl"></i>

                </div>

            </div>

        </div>

        {{-- LAPORAN --}}
        <div class="bg-[#EEF8FB]
            border border-[#BEE4EE]
            rounded-3xl p-6 shadow-sm
            hover:shadow-md transition">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-[#4E6B7B] font-medium">
                        Laporan Hari Ini
                    </p>

                    <h2 class="text-4xl font-bold
                        text-[#2B5D76] mt-3">

                        5

                    </h2>

                    <p class="text-sm text-[#6C8795] mt-2">
                        Laporan terbaru
                    </p>

                </div>

                <div class="w-16 h-16 rounded-2xl
                    bg-[#DDF2F7]
                    flex items-center justify-center">

                    <i class="fa-solid fa-file-medical
                        text-[#4B89A5] text-2xl"></i>

                </div>

            </div>

        </div>

        {{-- PASIEN BARU --}}
        <div class="bg-[#F0F6F9]
            border border-[#C4D7E2]
            rounded-3xl p-6 shadow-sm
            hover:shadow-md transition">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-[#4E6B7B] font-medium">
                        Pasien Baru
                    </p>

                    <h2 class="text-4xl font-bold
                        text-[#2B5D76] mt-3">

                       15

                    </h2>

                    <p class="text-sm text-[#6C8795] mt-2">
                        Penambahan hari ini
                    </p>

                </div>

                <div class="w-16 h-16 rounded-2xl
                    bg-[#E4EEF3]
                    flex items-center justify-center">

                    <i class="fa-solid fa-bed-pulse
                        text-[#5E90A5] text-2xl"></i>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection