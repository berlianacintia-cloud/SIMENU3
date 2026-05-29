@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')

<div class="p-6 bg-[#EEF5F7] min-h-screen"">

    {{-- MODAL SUCCESS --}}
    @if(session('success'))

    <div id="successModal"
         class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">

        <div class="bg-white rounded-2xl w-full max-w-md p-10 text-center shadow-2xl">

            <!-- ICON -->
            <div class="flex justify-center mb-5">

                <div class="w-24 h-24 rounded-full border-4 border-green-200 flex items-center justify-center">

                    <span class="text-5xl text-green-400">
                        ✓
                    </span>

                </div>

            </div>

            <!-- TITLE -->
            <h2 class="text-4xl font-semibold text-gray-700 mb-4">

                User Berhasil Disimpan

            </h2>

            <!-- TEXT -->
            <p class="text-gray-500 mb-8 text-lg">

                Data user berhasil disimpan

            </p>

            <!-- BUTTON -->
            <button onclick="closeSuccessModal()"
                    class="bg-[#12384C] hover:bg-[#0D2C3C] text-white px-8 py-3 rounded-lg font-semibold">

                OK

            </button>

        </div>

    </div>

    @endif
    
    {{-- HEADER --}}
    <div class="mb-6">
        <p class="text-gray-500 mt-1">
            Daftar Pengguna dan Hak Akses
        </p>

    </div>

    {{-- CARD ROLE --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

        <div class="bg-red-50 border border-red-300 rounded-2xl p-4">

            <h3 class="text-red-600 font-semibold">
                Super Admin
            </h3>

            <p class="text-3xl font-bold mt-2">
                1
            </p>

        </div>

        <div class="bg-blue-50 border border-blue-300 rounded-2xl p-4">

            <h3 class="text-blue-600 font-semibold">
                Dokter
            </h3>

            <p class="text-3xl font-bold mt-2">
                15
            </p>

        </div>

        <div class="bg-green-50 border border-green-300 rounded-2xl p-4">

            <h3 class="text-green-600 font-semibold">
                Ahli Gizi
            </h3>

            <p class="text-3xl font-bold mt-2">
                13
            </p>

        </div>

        <div class="bg-orange-50 border border-orange-300 rounded-2xl p-4">

            <h3 class="text-orange-600 font-semibold">
                Produksi
            </h3>

            <p class="text-3xl font-bold mt-2">
                5
            </p>

        </div>

    </div>

    {{-- TABLE --}}
<div class="bg-white rounded-[28px] shadow-sm border border-slate-200 overflow-hidden">

    {{-- HEADER TABLE --}}
    <div class="flex items-center justify-between px-6 py-5 border-b border-slate-200 bg-[#F8FBFC]">

        <div>

            <h2 class="text-2xl font-bold text-[#12384C]">
                Daftar User
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Data pengguna sistem SIMENU
            </p>

        </div>

        <button onclick="openModal()"
                class="bg-[#12384C] hover:bg-[#0D2C3C]
                text-white px-5 py-3 rounded-2xl
                font-semibold transition-all duration-200
                shadow-sm">

            <i class="fa-solid fa-plus mr-2"></i>
            Tambah User

        </button>

    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto">

        <table class="w-full">

            {{-- HEAD --}}
            <thead class="bg-slate-100 text-slate-600 uppercase text-sm">

                <tr>

                    <th class="px-6 py-4 text-left font-bold">
                        Nama Lengkap
                    </th>

                    <th class="px-6 py-4 text-left font-bold">
                        NIP
                    </th>

                    <th class="px-6 py-4 text-left font-bold">
                        Status
                    </th>

                    <th class="px-6 py-4 text-left font-bold">
                        Role
                    </th>

                    <th class="px-6 py-4 text-left font-bold">
                        Unit Kerja
                    </th>

                    <th class="px-6 py-4 text-center font-bold">
                        Aksi
                    </th>

                </tr>

            </thead>



            {{-- BODY --}}
            <tbody class="divide-y divide-slate-100 bg-white">

                @foreach($users as $user)

                <tr class="hover:bg-slate-50 transition-all duration-150">

                    {{-- NAMA --}}
                    <td class="px-6 py-5">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-2xl bg-blue-100
                                        flex items-center justify-center
                                        font-bold text-blue-700">

                                {{ strtoupper(substr($user->name, 0, 1)) }}

                            </div>

                            <div>

                                <h1 class="font-semibold text-slate-800">
                                    {{ $user->name }}
                                </h1>

                                <p class="text-xs text-slate-500">
                                    Pengguna SIMENU
                                </p>

                            </div>

                        </div>

                    </td>



                    {{-- NIP --}}
                    <td class="px-6 py-5 text-slate-700 font-medium">
                        {{ $user->nip }}
                    </td>



                    {{-- STATUS --}}
                    <td class="px-6 py-5">

                        @if($user->status == 'Aktif')

                            <span class="bg-green-100 text-green-700
                                         text-xs px-4 py-2 rounded-full
                                         font-semibold">

                                Aktif

                            </span>

                        @else

                            <span class="bg-gray-200 text-gray-700
                                         text-xs px-4 py-2 rounded-full
                                         font-semibold">

                                Nonaktif

                            </span>

                        @endif

                    </td>



                    {{-- ROLE --}}
                    <td class="px-6 py-5">

                        <span class="bg-blue-50 text-blue-700
                                     border border-blue-200
                                     px-4 py-2 rounded-xl
                                     text-xs font-semibold">

                            {{ $user->role }}

                        </span>

                    </td>



                    {{-- UNIT --}}
                    <td class="px-6 py-5 font-medium text-slate-700">
                        {{ $user->unit_kerja }}
                    </td>

{{-- AKSI --}}
<td class="px-6 py-5">

    <div class="flex items-center justify-center gap-2">

        {{-- DETAIL --}}
        <a href="{{ route('users.show', $user->id) }}"
           class="bg-blue-100 hover:bg-blue-200
           text-blue-700 px-4 py-2 rounded-xl
           text-sm font-semibold transition-all duration-200">

            <i class="fa-solid fa-eye mr-1"></i>
            Detail

        </a>



        {{-- EDIT --}}
        <a href="{{ route('users.edit', $user->id) }}"
           class="bg-yellow-100 hover:bg-yellow-200
           text-yellow-700 px-4 py-2 rounded-xl
           text-sm font-semibold transition-all duration-200">

            <i class="fa-solid fa-pen-to-square mr-1"></i>
            Edit

        </a>



        {{-- HAPUS --}}
        <button onclick="openDeleteModal({{ $user->id }})"
                class="bg-red-100 hover:bg-red-200
                text-red-600 px-4 py-2 rounded-xl
                text-sm font-semibold transition-all duration-200">

            <i class="fa-solid fa-trash mr-1"></i>
            Hapus

        </button>

    </div>

</td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</div>

{{-- MODAL TAMBAH USER --}}
<div id="modalTambahUser"
     class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-3xl w-full max-w-4xl p-8 relative">

        <h1 class="text-4xl font-bold mb-2">
            Tambah User
        </h1>

        <p class="text-gray-500 mb-8">
            Tambah pengguna baru ke sistem
        </p>

        <form action="{{ route('manajemen-user.store') }}"
              method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- NAMA --}}
                <div>

                    <label class="font-semibold block mb-2">
                        Nama Lengkap
                    </label>

                    <input type="text"
                           name="name"
                           placeholder="Isi Nama Lengkap"
                           class="w-full border rounded-xl px-4 py-3">

                </div>

                {{-- EMAIL --}}
                <div>

                    <label class="font-semibold block mb-2">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           placeholder="Isi Email"
                           class="w-full border rounded-xl px-4 py-3">

                </div>

                {{-- NIP --}}
                <div>

                    <label class="font-semibold block mb-2">
                        NIP
                    </label>

                    <input type="text"
                           name="nip"
                           placeholder="Isi Nomor Induk Pegawai"
                           class="w-full border rounded-xl px-4 py-3">

                </div>

                {{-- PASSWORD --}}
                <div>

                    <label class="font-semibold block mb-2">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           placeholder="Isi Password"
                           class="w-full border rounded-xl px-4 py-3">

                </div>

            </div>

            {{-- ROLE --}}
            <div class="mt-6">

                <label class="font-semibold block mb-2">
                    Role
                </label>

               <select name="role"
    class="w-full rounded-xl border-gray-300 focus:ring-2 focus:ring-blue-500">

    <option value="">Pilih Role</option>

    <option value="admin">Admin</option>
    <option value="dokter">Dokter</option>
    <option value="ahli_gizi">Ahli Gizi</option>
    <option value="petugas_dapur">Petugas Dapur</option>
</select>

            </div>

            {{-- UNIT KERJA --}}
            <div class="mt-6">

                <label class="font-semibold block mb-2">
                    Unit Kerja
                </label>

                <select name="unit_kerja"
                        class="w-full border rounded-xl px-4 py-3">

                    <option value="Instalasi Gizi"
            {{ old('unit_kerja', $user->unit_kerja ?? '') == 'Instalasi Gizi' ? 'selected' : '' }}>
            Instalasi Gizi
        </option>

        <option value="Spesialis Penyakit Dalam"
            {{ old('unit_kerja', $user->unit_kerja ?? '') == 'Spesialis Penyakit Dalam' ? 'selected' : '' }}>
            Spesialis Penyakit Dalam
        </option>

        <option value="Rawat Inap"
            {{ old('unit_kerja', $user->unit_kerja ?? '') == 'Rawat Inap' ? 'selected' : '' }}>
            Rawat Inap
        </option>

        <option value="Poli Gizi"
            {{ old('unit_kerja', $user->unit_kerja ?? '') == 'Poli Gizi' ? 'selected' : '' }}>
            Poli Gizi
        </option>

        <option value="Dapur Rumah Sakit"
            {{ old('unit_kerja', $user->unit_kerja ?? '') == 'Dapur Rumah Sakit' ? 'selected' : '' }}>
            Dapur Rumah Sakit
        </option>


                </select>

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-4 mt-10">

                <button type="button"
                        onclick="closeModal()"
                        class="border px-8 py-3 rounded-xl font-semibold">

                    Batal

                </button>

                <button type="submit"
                        class="bg-[#12384C] text-white px-8 py-3 rounded-xl font-semibold">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

{{-- MODAL DELETE --}}
<div id="deleteModal"
     class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-3xl p-8 w-full max-w-md">

        <div class="text-center">

            <div class="text-6xl mb-4">
                🗑️
            </div>

            <h2 class="text-2xl font-bold mb-2">
                Hapus User
            </h2>

            <p class="text-gray-500 mb-6">
                Yakin ingin menghapus user ini?
            </p>

            <form id="deleteForm"
                  method="POST">

                @csrf
                @method('DELETE')

                <div class="flex justify-center gap-4">

                    <button type="button"
                            onclick="closeDeleteModal()"
                            class="border px-6 py-3 rounded-xl font-semibold">

                        Batal

                    </button>

                    <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-xl font-semibold">

                        Ya, Hapus

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

function openModal() {

    const modal = document.getElementById('modalTambahUser');

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {

    const modal = document.getElementById('modalTambahUser');

    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function openDeleteModal(id) {

    const modal = document.getElementById('deleteModal');

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    document.getElementById('deleteForm')
        .action = '/manajemen-user/' + id;
}

function closeDeleteModal() {

    const modal = document.getElementById('deleteModal');

    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function closeSuccessModal() {

    const modal = document.getElementById('successModal');

    if(modal) {

        modal.style.display = 'none';

    }
}

</script>
@endsection