@extends('layouts.app')

@section('content')

<div class="p-3">

    <!-- BACK -->
    <div class="mb-3">

        <a href="/patients"
           class="w-9 h-9 bg-[#E8EEF2] rounded-full flex items-center justify-center text-base text-[#1F516B]">

            ←

        </a>

    </div>

    <!-- TITLE -->
    <div class="mb-4">

        <h1 class="text-3xl font-bold text-[#1F516B]">
            Input Data Pasien
        </h1>

        <p class="text-sm text-gray-500">
            Tambahkan data pasien baru ke dalam sistem
        </p>

    </div>

    <form action="{{ route('patients.store') }}"
          method="POST">

        @csrf

        <!-- INFORMASI PRIBADI -->
        <div class="bg-[#EAF2F5] rounded-2xl shadow-md p-4 mb-4">

            <div class="flex items-start gap-3 mb-4">

                <div class="text-2xl text-green-700">
                    👤
                </div>

                <div>

                    <h1 class="text-xl font-bold text-green-700">
                        Informasi Pribadi
                    </h1>

                    <p class="text-xs text-gray-500">
                        Data dasar pasien
                    </p>

                </div>

            </div>

            <div class="grid grid-cols-2 gap-3">

                <!-- NAMA -->
                <div>

                    <label class="font-semibold text-sm">
                        Nama Pasien
                    </label>

                    <input type="text"
                           name="nama"
                           class="w-full border rounded-xl p-2.5 mt-1 bg-white text-sm">

                </div>

                <!-- NORM -->
                <div>

                    <label class="font-semibold text-sm">
                        NoRM (Nomor Rekam Medis)
                    </label>

                    <input type="text"
                           name="no_rm"
                           class="w-full border rounded-xl p-2.5 mt-1 bg-white text-sm">

                </div>

                <!-- JK -->
                <div>

                    <label class="font-semibold text-sm">
                        Jenis Kelamin
                    </label>

                    <select name="jenis_kelamin"
                            class="w-full border rounded-xl p-2.5 mt-1 bg-white text-sm">

                        <option>Laki-laki</option>
                        <option>Perempuan</option>

                    </select>

                </div>

                <!-- TGL -->
                <div>

                    <label class="font-semibold text-sm">
                        Tanggal Lahir
                    </label>

                    <input type="date"
                           name="tanggal_lahir"
                           class="w-full border rounded-xl p-2.5 mt-1 bg-white text-sm">

                </div>

                <!-- KAMAR -->
                <div>

                    <label class="font-semibold text-sm">
                        Nomor Kamar
                    </label>

                    <input type="text"
                           name="ruangan"
                           class="w-full border rounded-xl p-2.5 mt-1 bg-white text-sm">

                </div>

                <!-- BANGSAL -->
                <div>

                    <label class="font-semibold text-sm">
                        Bangsal
                    </label>

                    <input type="text"
                           name="kelas"
                           class="w-full border rounded-xl p-2.5 mt-1 bg-white text-sm">

                </div>

            </div>

        </div>

        <!-- GRID -->
        <div class="grid grid-cols-2 gap-3 mb-4">

            <!-- INFORMASI MEDIS -->
            <div class="bg-[#EAF2F5] rounded-2xl shadow-md p-4">

                <div class="flex items-start gap-3 mb-4">

                    <div class="text-2xl text-blue-700">
                        🩺
                    </div>

                    <div>

                        <h1 class="text-xl font-bold text-blue-700">
                            Informasi Medis
                        </h1>

                        <p class="text-xs text-gray-500">
                            Data kesehatan pasien
                        </p>

                    </div>

                </div>

                <!-- DIAGNOSA -->
                <div class="mb-3">

                    <label class="font-semibold text-sm">
                        Diagnosis Penyakit
                    </label>

                    <textarea name="diagnosa"
                              rows="2"
                              class="w-full border rounded-xl p-2.5 mt-1 bg-white text-sm"></textarea>

                </div>

                <div class="grid grid-cols-2 gap-3">

                    <!-- DIET -->
                    <div>

                        <label class="font-semibold text-sm">
                            Jenis Diet
                        </label>

                        <select name="jenis_diet"
                                class="w-full border rounded-xl p-2.5 mt-1 bg-white text-sm">

                            <option>Diet DM</option>
                            <option>Diet Rendah Garam</option>
                            <option>Diet Cair</option>
                            <option>Diet Tinggi Protein</option>

                        </select>

                    </div>

                    <!-- ALERGI -->
                    <div>

                        <label class="font-semibold text-sm">
                            Keterangan Alergi
                        </label>

                        <input type="text"
                               name="alergi"
                               class="w-full border rounded-xl p-2.5 mt-1 bg-white text-sm">

                    </div>

                </div>

            </div>

            <!-- INFORMASI KONTAK -->
            <div class="bg-[#EAF2F5] rounded-2xl shadow-md p-4">

                <div class="flex items-start gap-3 mb-4">

                    <div class="text-2xl text-purple-700">
                        ☎
                    </div>

                    <div>

                        <h1 class="text-xl font-bold text-purple-700">
                            Informasi Kontak
                        </h1>

                        <p class="text-xs text-gray-500">
                            Data kontak pasien/keluarga
                        </p>

                    </div>

                </div>

                <!-- TELEPON -->
                <div class="mb-3">

                    <label class="font-semibold text-sm">
                        Nomor Telepon
                    </label>

                    <input type="text"
                           name="telepon"
                           class="w-full border rounded-xl p-2.5 mt-1 bg-white text-sm">

                </div>

                <!-- DARURAT -->
                <div>

                    <label class="font-semibold text-sm">
                        Kontak Darurat/Keluarga
                    </label>

                    <input type="text"
                           name="kontak_darurat"
                           class="w-full border rounded-xl p-2.5 mt-1 bg-white text-sm">

                </div>

            </div>

        </div>

        <!-- CATATAN -->
        <div class="bg-[#EAF2F5] rounded-2xl shadow-md p-4 mb-5">

            <div class="flex items-start gap-3 mb-4">

                <div class="text-2xl text-yellow-500">
                    📝
                </div>

                <div>

                    <h1 class="text-xl font-bold text-yellow-600">
                        Catatan Tambahan
                    </h1>

                    <p class="text-xs text-gray-500">
                        Informasi tambahan lainnya
                    </p>

                </div>

            </div>

            <div>

                <label class="font-semibold text-sm">
                    Keterangan Tambahan
                </label>

                <textarea name="catatan"
                          rows="2"
                          class="w-full border rounded-xl p-2.5 mt-1 bg-white text-sm"></textarea>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3">

            <a href="/patients"
               class="bg-red-100 text-red-600 px-5 py-2.5 rounded-xl font-semibold text-sm">

                ✖ Batal

            </a>

            <button class="bg-[#12008B] hover:bg-[#0E006D] text-white px-5 py-2.5 rounded-xl font-semibold text-sm">

                💾 Simpan Data

            </button>

        </div>

    </form>

</div>

@endsection