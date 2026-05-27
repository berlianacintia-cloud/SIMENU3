@extends('layouts.app')

@section('title', 'Dashboard Petugas Dapur')

@section('content')

<div class="space-y-8">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-[#1F516B] to-[#4B89A5]
        rounded-[32px] p-8 text-white relative overflow-hidden">

        <div class="relative z-10">

            <p class="uppercase tracking-[4px]
                text-sm opacity-80">

                PRODUKSI MAKANAN RUMAH SAKIT

            </p>

            <h1 class="text-4xl font-bold mt-3">
                Monitoring Produksi & Distribusi Menu
            </h1>

            <p class="mt-4 text-lg opacity-90">
                Selamat datang kembali,
                {{ Auth::user()->name }}
            </p>

        </div>

    </div>

    {{-- QUICK MENU --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- STATUS MENU --}}
        <a href="/status-menu"
           class="bg-white rounded-3xl p-6
           border border-[#DCEAF1]
           shadow-sm hover:shadow-md transition">

            <div class="w-14 h-14 rounded-2xl
                bg-[#EEF7FB]
                flex items-center justify-center mb-5">

                <i class="fa-solid fa-clipboard-check
                    text-[#2B5D76] text-2xl"></i>

            </div>

            <h2 class="text-xl font-bold text-[#1F516B]">
                Status Menu
            </h2>

            <p class="text-gray-500 mt-2">
                Monitoring proses produksi makanan pasien
            </p>

        </a>

        {{-- CETAK LABEL --}}
        <a href="/cetak-label"
           class="bg-white rounded-3xl p-6
           border border-[#DCEAF1]
           shadow-sm hover:shadow-md transition">

            <div class="w-14 h-14 rounded-2xl
                bg-[#EEF7FB]
                flex items-center justify-center mb-5">

                <i class="fa-solid fa-print
                    text-[#2B5D76] text-2xl"></i>

            </div>

            <h2 class="text-xl font-bold text-[#1F516B]">
                Cetak Label
            </h2>

            <p class="text-gray-500 mt-2">
                Cetak label makanan pasien rawat inap
            </p>

        </a>

    </div>

    {{-- STATISTIK --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- TOTAL MENU --}}
    <div class="bg-white rounded-3xl p-6
        border border-[#E4EEF3] shadow-sm">

        <p class="text-gray-500">
            Total Menu Pasien
        </p>

        <h1 class="text-5xl font-bold
            text-[#1F516B] mt-3">

            {{ $recentMenus->count() }}

        </h1>

        <p class="text-sm text-gray-400 mt-3">
            Data menu terbaru
        </p>

    </div>

    {{-- MENU TERSEDIA --}}
    <div class="bg-white rounded-3xl p-6
        border border-[#E4EEF3] shadow-sm">

        <p class="text-gray-500">
            Jadwal Makan
        </p>

        <h1 class="text-5xl font-bold
            text-[#4B89A5] mt-3">

            {{ $recentMenus->pluck('jadwal_makan')->unique()->count() }}

        </h1>

        <p class="text-sm text-gray-400 mt-3">
            Jadwal aktif hari ini
        </p>

    </div>

    {{-- BENTUK MAKANAN --}}
    <div class="bg-white rounded-3xl p-6
        border border-[#E4EEF3] shadow-sm">

        <p class="text-gray-500">
            Bentuk Makanan
        </p>

        <h1 class="text-5xl font-bold
            text-green-500 mt-3">

            {{ $recentMenus->pluck('bentuk_makanan')->unique()->count() }}

        </h1>

        <p class="text-sm text-gray-400 mt-3">
            Variasi bentuk makanan
        </p>

    </div>

</div>
        {{-- DIPROSES --}}
        <div class="bg-white rounded-3xl p-6
            border border-[#E4EEF3] shadow-sm">

            <p class="text-gray-500">
                Diproses
            </p>

            <h1 class="text-5xl font-bold
                text-yellow-500 mt-3">

                {{ $menuDiproses }}

            </h1>

        </div>

        {{-- SELESAI --}}
        <div class="bg-white rounded-3xl p-6
            border border-[#E4EEF3] shadow-sm">

            <p class="text-gray-500">
                Selesai
            </p>

            <h1 class="text-5xl font-bold
                text-green-500 mt-3">

                {{ $menuSelesai }}

            </h1>

        </div>

        {{-- LABEL --}}
        <div class="bg-white rounded-3xl p-6
            border border-[#E4EEF3] shadow-sm">

            <p class="text-gray-500">
                Label Dicetak
            </p>

            <h1 class="text-5xl font-bold
                text-[#4B89A5] mt-3">

                {{ $labelDicetak }}

            </h1>

        </div>

    </div>

    {{-- TABLE MENU --}}
    <div class="bg-white rounded-3xl
        border border-[#E5EEF3]
        shadow-sm overflow-hidden">

        <div class="p-6 border-b border-[#EEF3F6]">

            <h2 class="text-2xl font-bold text-[#1F516B]">
                Produksi Menu Pasien
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-[#F4F9FC]">

                    <tr>

                        <th class="px-6 py-4 text-left">
                            Pasien
                        </th>

                        <th class="px-6 py-4 text-left">
                            Diet
                        </th>

                        <th class="px-6 py-4 text-left">
                            Jadwal
                        </th>

                        <th class="px-6 py-4 text-left">
                            Bentuk
                        </th>

                        <th class="px-6 py-4 text-left">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($recentMenus as $menu)

                    <tr class="border-t border-[#EEF3F6]">

                        <td class="px-6 py-5">

                            {{ $menu->patient->nama ?? '-' }}

                        </td>

                        <td class="px-6 py-5">

                            {{ $menu->jenis_diet }}

                        </td>

                        <td class="px-6 py-5">

                            {{ $menu->jadwal_makan }}

                        </td>

                        <td class="px-6 py-5">

                            {{ $menu->bentuk_makanan }}

                        </td>

                        <td class="px-6 py-5">

                            <span class="px-4 py-2 rounded-full text-xs

                                @if($menu->status_menu == 'Diproses')
                                    bg-yellow-100 text-yellow-700
                                @elseif($menu->status_menu == 'Selesai')
                                    bg-green-100 text-green-700
                                @else
                                    bg-gray-100 text-gray-700
                                @endif">

                                {{ $menu->status_menu }}

                            </span>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection