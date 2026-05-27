@extends('layouts.app')

@section('title', 'Dashboard Ahli Gizi')

@section('content')

<div class="space-y-6">

    {{-- HERO --}}
    <div class="relative overflow-hidden rounded-[30px]
        bg-gradient-to-r from-[#2B5D76] to-[#4B89A5]
        p-7 shadow-md">

        <div class="absolute right-0 top-0 opacity-10">

            <i class="fa-solid fa-bowl-food text-[170px]"></i>

        </div>

        <div class="relative z-10 flex items-center justify-between">

            <div>

                <p class="uppercase tracking-[3px]
                    text-xs text-white/80 font-medium">

                    Pelayanan Gizi Rumah Sakit

                </p>

                <h1 class="text-3xl font-bold mt-3
                    text-white leading-tight">

                    Monitoring Menu & Status Pasien

                </h1>

                <p class="mt-4 text-white/90">

                    Selamat datang kembali,
                    <span class="font-semibold">
                        {{ auth()->user()->name }}
                    </span>

                </p>

            </div>

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
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

        <a href="/patients"
           class="bg-[#F9FCFD] rounded-3xl p-6
           border border-[#D7E5EC]
           shadow-sm hover:shadow-md transition">

            <div class="w-14 h-14 rounded-2xl
                bg-[#EDF6FA]
                flex items-center justify-center mb-5">

                <i class="fa-solid fa-user-injured
                    text-[#2B5D76] text-2xl"></i>

            </div>

            <h2 class="text-lg font-bold text-[#2B5D76]">
                Data Pasien
            </h2>

            <p class="text-gray-500 text-sm mt-2">
                Lihat daftar pasien
            </p>

        </a>

       {{-- MENU PASIEN --}}
<a href="{{ route('gizi.menu-pasien') }}"
   class="bg-[#F9FCFD] rounded-3xl p-6
   border border-[#D7E5EC]
   shadow-sm hover:shadow-md transition">

    <div class="w-14 h-14 rounded-2xl
        bg-[#EEF8FB]
        flex items-center justify-center mb-5">

        <i class="fa-solid fa-bowl-food
            text-[#4B89A5] text-2xl"></i>

    </div>

    <h2 class="text-lg font-bold text-[#2B5D76]">
        Menu Pasien
    </h2>

    <p class="text-gray-500 text-sm mt-2">
        Daftar menu makanan pasien rawat inap
    </p>

</a>
        <a href="/status-menu"
           class="bg-[#F9FCFD] rounded-3xl p-6
           border border-[#D7E5EC]
           shadow-sm hover:shadow-md transition">

            <div class="w-14 h-14 rounded-2xl
                bg-[#F0F6F9]
                flex items-center justify-center mb-5">

                <i class="fa-solid fa-clipboard-check
                    text-[#5E90A5] text-2xl"></i>

            </div>

            <h2 class="text-lg font-bold text-[#2B5D76]">
                Status Menu
            </h2>

            <p class="text-gray-500 text-sm mt-2">
                Monitoring menu pasien
            </p>

        </a>

        <a href="/laporan"
           class="bg-[#F9FCFD] rounded-3xl p-6
           border border-[#D7E5EC]
           shadow-sm hover:shadow-md transition">

            <div class="w-14 h-14 rounded-2xl
                bg-[#EEF8FB]
                flex items-center justify-center mb-5">

                <i class="fa-solid fa-file-medical
                    text-[#4B89A5] text-2xl"></i>

            </div>

            <h2 class="text-lg font-bold text-[#2B5D76]">
                Laporan
            </h2>

            <p class="text-gray-500 text-sm mt-2">
                Laporan data menu pasien
            </p>

        </a>

    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

        {{-- TOTAL PASIEN --}}
        <div class="bg-[#EDF6FA]
            border border-[#B7D4E5]
            rounded-3xl p-6 shadow-sm">

            <p class="text-sm text-[#4E6B7B] font-medium">
                Total Pasien
            </p>

            <h2 class="text-4xl font-bold
                text-[#2B5D76] mt-3">

                {{ $totalPasien }}

            </h2>

            <p class="text-sm text-[#6C8795] mt-2">
                Pasien terdaftar
            </p>

        </div>

        {{-- MENU AKTIF --}}
        <div class="bg-[#EEF8FB]
            border border-[#BEE4EE]
            rounded-3xl p-6 shadow-sm">

            <p class="text-sm text-[#4E6B7B] font-medium">
                Menu Aktif
            </p>

            <h2 class="text-4xl font-bold
                text-[#2B5D76] mt-3">

                {{ $menuAktif }}

            </h2>

            <p class="text-sm text-[#6C8795] mt-2">
                Menu sedang diproses
            </p>

        </div>

        {{-- STATUS MENU --}}
        <div class="bg-[#F0F6F9]
            border border-[#C4D7E2]
            rounded-3xl p-6 shadow-sm">

            <p class="text-sm text-[#4E6B7B] font-medium">
                Status Menu
            </p>

            <h2 class="text-4xl font-bold
                text-[#2B5D76] mt-3">

                {{ $statusMenu }}

            </h2>

            <p class="text-sm text-[#6C8795] mt-2">
                Monitoring menu
            </p>

        </div>

        {{-- LAPORAN --}}
        <div class="bg-[#F4FAFC]
            border border-[#D9EDF3]
            rounded-3xl p-6 shadow-sm">

            <p class="text-sm text-[#4E6B7B] font-medium">
                Laporan Hari Ini
            </p>

            <h2 class="text-4xl font-bold
                text-[#2B5D76] mt-3">

                {{ $laporanHariIni }}

            </h2>

            <p class="text-sm text-[#6C8795] mt-2">
                Laporan terbaru
            </p>

        </div>

    </div>

</div>

@endsection