<div class="w-[230px] min-h-screen bg-[#1F516B] rounded-r-[28px] text-white py-6 flex flex-col">

{{-- FONT --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- FONT AWESOME --}}
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

{{-- LOGO --}}
<div class="flex flex-col items-center mb-10 px-5">

<img
    src="{{ asset('images/logo-rs.svg.svg') }}"
    class="w-20 mb-2"
>

    <h1 class="text-4xl font-bold text-white tracking-wide">
        SIMENU
    </h1>

    <p class="text-center text-sm text-gray-200 leading-5 mt-2">
        Sistem Informasi <br>
        Pengelolaan Menu Pasien
    </p>

</div>

{{-- MENU --}}
<div class="flex flex-col gap-3 px-4">



    {{-- ================= ADMIN ================= --}}
    @role('admin')
    
    <a href="/admin/dashboard"
   class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
   {{ request()->is('admin/dashboard*') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

    <i class="fa-solid fa-house text-lg w-5 text-center"></i>

    <span class="text-[15px] font-medium">
        Dashboard
    </span>

</a>

    {{-- DATA PASIEN --}}
    <a href="{{ route('patients.index') }}"
       class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
       {{ request()->routeIs('patients.*') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

        <i class="fa-solid fa-user-injured text-lg w-5 text-center"></i>

        <span class="text-[15px] font-medium">
            Data Pasien
        </span>

    </a>

    {{-- MANAJEMEN USER --}}
    <a href="{{ route('manajemen-user.index') }}"
       class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
       {{ request()->routeIs('manajemen-user.*') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

        <i class="fa-solid fa-users text-lg w-5 text-center"></i>

        <span class="text-[15px] font-medium">
            Manajemen User
        </span>

    </a>

    {{-- MENU PASIEN --}}
    <a href="{{ route('menu-pasien.index') }}"
       class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
       {{ request()->routeIs('menu-pasien.*') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

        <i class="fa-solid fa-utensils text-lg w-5 text-center"></i>

        <span class="text-[15px] font-medium">
            Pengelolaan Menu Pasien
        </span>

    </a>

    {{-- STATUS MENU --}}
    <a href="{{ route('status-menu') }}"
       class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
       {{ request()->routeIs('status-menu') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

        <i class="fa-solid fa-clipboard-check text-lg w-5 text-center"></i>

        <span class="text-[15px] font-medium">
            Status Menu
        </span>

    </a>

    {{-- CETAK LABEL --}}
    <a href="{{ route('cetak-label') }}"
       class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
       {{ request()->routeIs('cetak-label') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

        <i class="fa-solid fa-print text-lg w-5 text-center"></i>

        <span class="text-[15px] font-medium">
            Cetak Label
        </span>

    </a>

    {{-- LAPORAN --}}
    <a href="{{ route('laporan') }}"
       class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
       {{ request()->routeIs('laporan') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

        <i class="fa-solid fa-file-lines text-lg w-5 text-center"></i>

        <span class="text-[15px] font-medium">
            Laporan
        </span>

    </a>

    @endrole


    {{-- ================= DOKTER ================= --}}
    @role('dokter')

{{-- DASHBOARD --}}
<a href="/dokter/dashboard"
   class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
   {{ request()->is('dokter/dashboard*') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

    <i class="fa-solid fa-house text-lg w-5 text-center"></i>

    <span class="text-[15px] font-medium">
        Dashboard
    </span>

</a>

{{-- DATA PASIEN --}}
<a href="{{ route('patients.index') }}"
   class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
   {{ request()->routeIs('patients.*') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

    <i class="fa-solid fa-user-doctor text-lg w-5 text-center"></i>

    <span class="text-[15px] font-medium">
        Data Pasien
    </span>

</a>

@endrole

    {{-- ================= AHLI GIZI ================= --}}
    @role('ahli_gizi')

    {{-- DASHBOARD --}}
<a href="/gizi/dashboard"
   class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
   {{ request()->is('gizi/dashboard*') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

    <i class="fa-solid fa-house text-lg w-5 text-center"></i>

    <span class="text-[15px] font-medium">
        Dashboard
    </span>

</a>

    <a href="{{ route('menu-pasien.index') }}"
       class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
       {{ request()->routeIs('menu-pasien.*') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

        <i class="fa-solid fa-bowl-food text-lg w-5 text-center"></i>

        <span class="text-[15px] font-medium">
            Pengelolaan Menu Pasien
        </span>

    </a>

    <a href="{{ route('status-menu') }}"
       class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
       {{ request()->routeIs('status-menu') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

        <i class="fa-solid fa-clipboard-list text-lg w-5 text-center"></i>

        <span class="text-[15px] font-medium">
            Status Menu
        </span>

    </a>
    {{-- LAPORAN --}}
<a href="/laporan"
   class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
   {{ request()->is('laporan*') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

    <i class="fa-solid fa-file-medical text-lg w-5 text-center"></i>

    <span class="text-[15px] font-medium">
        Laporan
    </span>

</a>

    @endrole

{{-- ================ PETUGAS DAPUR ================= --}}
    @role('petugas_dapur')

    {{-- DASHBOARD --}}
    <a href="/dapur/dashboard"
       class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
       {{ request()->is('dapur/dashboard*') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

        <i class="fa-solid fa-house text-lg w-5 text-center"></i>

        <span class="text-[15px] font-medium">
            Dashboard
        </span>

    </a>

    {{-- STATUS MENU --}}
    <a href="/status-menu"
       class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
       {{ request()->is('status-menu*') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

        <i class="fa-solid fa-clipboard-check text-lg w-5 text-center"></i>

        <span class="text-[15px] font-medium">
            Status Menu
        </span>

    </a>

    {{-- CETAK LABEL --}}
    <a href="/cetak-label"
       class="flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300
       {{ request()->is('cetak-label*') ? 'bg-white/10 shadow-md' : 'hover:bg-white/10' }}">

        <i class="fa-solid fa-print text-lg w-5 text-center"></i>

        <span class="text-[15px] font-medium">
            Cetak Label
        </span>

    </a>

@endrole

</div>

</div>