@extends('layouts.app')

@section('title', 'Edit Data Pasien')

@section('content')

<div class="p-6 md:p-3 overflow-y-auto bg-[#EEF5F7] min-h-screen">

    <!-- HEADER -->
     @if(session('success'))

<div class="bg-green-100 border border-green-200 text-green-700 px-6 py-4 rounded-2xl mb-6 shadow-sm flex items-center justify-between">

    <div class="flex items-center gap-4">

        <div class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center text-white text-2xl">
            ✓
        </div>

        <div>

            <h3 class="font-bold text-lg">
                Data pasien berhasil diperbarui!
            </h3>

            <p class="text-sm text-green-600">
                Perubahan informasi pasien telah berhasil disimpan ke dalam sistem.
            </p>

        </div>

    </div>

    <a href="{{ route('patients.index') }}"
       class="bg-green-200 hover:bg-green-300 transition px-5 py-3 rounded-xl font-semibold text-green-800">
        Lihat Daftar Pasien
    </a>

</div>

@endif

    <div class="mb-6">

        <p class="text-gray-600 text-sm mt-1">
            Perbarui Informasi Pasien
        </p>

    </div>

    <form action="{{ route('patients.update', $patient->id) }}" method="POST">

        @csrf
        @method('PUT')

        <!-- CARD IDENTITAS -->
        <div class="bg-white rounded-3xl shadow-md p-5 mb-6">

            <div class="flex items-center gap-5">

                <div class="w-24 h-24 rounded-full bg-blue-100 flex items-center justify-center text-4xl font-bold text-blue-600">
                    {{ strtoupper(substr($patient->nama,0,1)) }}
                </div>

                <div>

                    <h2 class="text-3xl font-bold">
                        {{ strtoupper($patient->nama) }}
                    </h2>

                    <div class="flex items-center gap-3 mt-2">

                        <span class="bg-pink-100 text-pink-500 px-4 py-1 rounded-full text-sm font-semibold">
                            {{ $patient->jenis_kelamin }}
                        </span>

                        <span class="text-gray-600 text-sm">
                            {{ \Carbon\Carbon::parse($patient->tanggal_lahir)->age }} Tahun
                        </span>

                    </div>

                    <div class="grid grid-cols-3 gap-8 mt-5 text-sm text-gray-600">

                        <div>
                            <p>No. Rekam Medis</p>

                            <h4 class="font-bold text-gray-800">
                                {{ $patient->no_rm }}
                            </h4>
                        </div>

                        <div>
                            <p>Status</p>

                            <h4 class="font-bold text-green-600">
                                {{ $patient->status }}
                            </h4>
                        </div>

                        <div>
                            <p>Bangsal</p>

                            <h4 class="font-bold text-gray-800">
                                {{ $patient->kelas }}
                            </h4>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- FORM -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- INFORMASI PRIBADI -->
            <div class="bg-[#F2F8FA] rounded-3xl shadow-md p-6 ">

                <h3 class="text-xl font-bold text-green-700 mb-5">
                    Informasi Pribadi
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <label class="font-semibold text-sm">
                            Nama Pasien
                        </label>

                        <input type="text"
                               name="nama"
                               value="{{ $patient->nama }}"
                               class="w-full mt-2 border rounded-xl px-4 py-3">
                    </div>

                    <div>
                        <label class="font-semibold text-sm">
                            NoRM
                        </label>

                        <input type="text"
                               name="no_rm"
                               value="{{ $patient->no_rm }}"
                               class="w-full mt-2 border rounded-xl px-4 py-3">
                    </div>

                    <div>
                        <label class="font-semibold text-sm">
                            Jenis Kelamin
                        </label>

                        <select name="jenis_kelamin"
                                class="w-full mt-2 border rounded-xl px-4 py-3">

                            <option value="Laki-laki"
                                {{ $patient->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>

                            <option value="Perempuan"
                                {{ $patient->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>

                        </select>
                    </div>

                    <div>
                        <label class="font-semibold text-sm">
                            Tanggal Lahir
                        </label>

                        <input type="date"
                               name="tanggal_lahir"
                               value="{{ $patient->tanggal_lahir }}"
                               class="w-full mt-2 border rounded-xl px-4 py-3">
                    </div>

                    <div>
                        <label class="font-semibold text-sm">
                            Nomor Kamar
                        </label>

                        <input type="text"
                               name="ruangan"
                               value="{{ $patient->ruangan }}"
                               class="w-full mt-2 border rounded-xl px-4 py-3">
                    </div>

                    <div>
                        <label class="font-semibold text-sm">
                            Bangsal
                        </label>

                        <input type="text"
                               name="kelas"
                               value="{{ $patient->kelas }}"
                               class="w-full mt-2 border rounded-xl px-4 py-3">
                    </div>

                </div>

            </div>

            <!-- INFORMASI MEDIS -->
            <div class="bg-[#F2F8FA] rounded-3xl shadow-md p-6">

                <h3 class="text-xl font-bold text-blue-700 mb-5">
                    Informasi Medis
                </h3>

                <div class="space-y-4">

                    <div>
                        <label class="font-semibold text-sm">
                            Diagnosis Penyakit
                        </label>

                        <input type="text"
                               name="diagnosa"
                               value="{{ $patient->diagnosa }}"
                               class="w-full mt-2 border rounded-xl px-4 py-3">
                    </div>

                    <div>
                        <label class="font-semibold text-sm">
                            Jenis Diet
                        </label>

                        <select
    name="jenis_diet"
    class="w-full mt-2 border rounded-xl px-4 py-3 bg-white">

    <option value="">Pilih Jenis Diet</option>

    <option value="Diet DM"
        {{ $patient->jenis_diet == 'Diet DM' ? 'selected' : '' }}>
        Diet DM
    </option>

    <option value="Diet Cair"
        {{ $patient->jenis_diet == 'Diet Rendah Protein' ? 'selected' : '' }}>
        Diet Cair
    </option>

    <option value="Diet Rendah Garam"
        {{ $patient->jenis_diet == 'Diet Rendah Garam' ? 'selected' : '' }}>
        Diet Rendah Garam
    </option>

    <option value="Diet Tinggi Protein"
        {{ $patient->jenis_diet == 'Diet Tinggi Protein' ? 'selected' : '' }}>
        Diet Tinggi Protein
    </option>

    <option value="Diet Lunak"
        {{ $patient->jenis_diet == 'Diet Tinggi Serat' ? 'selected' : '' }}>
        Diet Lunak
    </option>

</select>
                    </div>

                    <div>
                        <label class="font-semibold text-sm">
                            Keterangan Alergi
                        </label>

                        <input type="text"
                               name="alergi"
                               value="{{ $patient->alergi }}"
                               class="w-full mt-2 border rounded-xl px-4 py-3">
                    </div>

                </div>

            </div>

        </div>

        <!-- BAWAH -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

            <!-- KONTAK -->
            <div class="bg-[#F2F8FA] rounded-3xl shadow-md p-6">

                <h3 class="text-xl font-bold text-purple-600 mb-5">
                    Informasi Kontak
                </h3>

                <div class="space-y-4">

                    <div>
                        <label class="font-semibold text-sm">
                            Nomor Telepon
                        </label>

                        <input type="text"
                               name="telepon"
                               value="{{ $patient->telepon }}"
                               class="w-full mt-2 border rounded-xl px-4 py-3">
                    </div>

                    <div>
                        <label class="font-semibold text-sm">
                            Kontak Darurat/Keluarga
                        </label>

                        <input type="text"
                               name="kontak_darurat"
                               value="{{ $patient->kontak_darurat }}"
                               class="w-full mt-2 border rounded-xl px-4 py-3">
                    </div>

                </div>

            </div>

            <!-- CATATAN -->
            <div class="bg-[#F2F8FA] rounded-3xl shadow-md p-6">

                <h3 class="text-xl font-bold text-yellow-600 mb-5">
                    Catatan Tambahan
                </h3>

                <textarea name="catatan"
                          rows="6"
                          class="w-full border rounded-xl px-4 py-3">{{ $patient->catatan }}</textarea>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-4 mt-8">

            <a href="{{ route('patients.index') }}"
               class="bg-red-100 text-red-600 px-6 py-3 rounded-xl font-semibold">
                Batal
            </a>

            <button type="submit"
                    class="bg-indigo-900 hover:bg-indigo-800 text-white px-8 py-3 rounded-xl font-semibold shadow-lg">
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@endsection