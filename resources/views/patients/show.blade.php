@extends('layouts.app')

@section('page-title', 'Detail Data Pasien')

@section('content')

<div class="p-4">

    <!-- HEADER -->
    <div class="mb-3">

        <p class="text-gray-500 text-sm">
            Informasi Lengkap Data Pasien
        </p>

    </div>

    <!-- PROFILE CARD -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 mb-3">

        <div class="flex flex-col md:flex-row md:items-center gap-5">

            <!-- AVATAR -->
            <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center">

                <span class="text-4xl font-bold text-blue-600">
                    {{ strtoupper(substr($patient->nama,0,1)) }}
                </span>

            </div>

            <!-- INFO -->
            <div class="flex-1">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <div>

                        <h2 class="text-4xl font-bold text-gray-800">
                            {{ strtoupper($patient->nama) }}
                        </h2>

                        <div class="flex items-center gap-3 mt-2">

                            <span class="bg-pink-100 text-pink-600 px-3 py-1 rounded-full text-xs font-medium">
                                {{ $patient->jenis_kelamin }}
                            </span>

                            <span class="text-gray-500 text-sm">
                                Pasien
                            </span>

                        </div>

                    </div>

                    <!-- STATUS -->
                    <div>

                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-medium">

                            {{ $patient->status }}

                        </span>

                    </div>

                </div>

                <!-- GRID INFO -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-5">

                    <div>

                        <p class="text-gray-500 text-sm">
                            No. Rekam Medis
                        </p>

                        <p class="font-semibold text-gray-800">
                            {{ $patient->no_rm }}
                        </p>

                    </div>

                    <div>

                        <p class="text-gray-500 text-sm">
                            Tanggal Lahir
                        </p>

                        <p class="font-semibold text-gray-800">
                            {{ $patient->tanggal_lahir }}
                        </p>

                    </div>

                    <div>

                        <p class="text-gray-500 text-sm">
                            Ruangan
                        </p>

                        <p class="font-semibold text-gray-800">
                            {{ $patient->ruangan }}
                        </p>

                    </div>

                    <div>

                        <p class="text-gray-500 text-sm">
                            Bangsal
                        </p>

                        <p class="font-semibold text-gray-800">
                            {{ $patient->kelas }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- DETAIL -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">

        <h3 class="text-xl font-bold text-[#123B7A] mb-3">
            Detail Pasien
        </h3>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

            <!-- INFORMASI PRIBADI -->
            <div class="bg-[#F1FAF2] rounded-xl p-5">

                <h4 class="text-lg font-bold text-green-700 mb-3">
                    Informasi Pribadi
                </h4>

                <div class="space-y-3 text-sm">

                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-500">Nama Lengkap</span>
                        <span class="font-semibold text-gray-800">{{ $patient->nama }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-500">Jenis Kelamin</span>
                        <span class="font-semibold text-gray-800">{{ $patient->jenis_kelamin }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-500">Tanggal Lahir</span>
                        <span class="font-semibold text-gray-800">{{ $patient->tanggal_lahir }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-500">Nomor Rekam Medis</span>
                        <span class="font-semibold text-gray-800">{{ $patient->no_rm }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-500">Nomor Kamar</span>
                        <span class="font-semibold text-gray-800">{{ $patient->ruangan }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Bangsal</span>
                        <span class="font-semibold text-gray-800">{{ $patient->kelas }}</span>
                    </div>

                </div>

            </div>

            <!-- INFORMASI MEDIS -->
            <div class="bg-[#F3FAFF] rounded-xl p-5">

                <h4 class="text-lg font-bold text-blue-600 mb-3">
                    Informasi Medis
                </h4>

                <div class="space-y-3 text-sm">

                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-500">Diagnosis Penyakit</span>
                        <span class="font-semibold text-gray-800">{{ $patient->diagnosa }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-500">Jenis Diet</span>
                        <span class="font-semibold text-gray-800">{{ $patient->jenis_diet }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Keterangan Alergi</span>
                        <span class="font-semibold text-gray-800">{{ $patient->alergi }}</span>
                    </div>

                </div>

            </div>

            <!-- KONTAK -->
            <div class="bg-[#F8F1FF] rounded-xl p-5">

                <h4 class="text-lg font-bold text-purple-600 mb-3">
                    Informasi Kontak
                </h4>

                <div class="space-y-3 text-sm">

                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-500">Nomor Telepon</span>
                        <span class="font-semibold text-gray-800">{{ $patient->telepon }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Kontak Darurat</span>
                        <span class="font-semibold text-gray-800">{{ $patient->kontak_darurat }}</span>
                    </div>

                </div>

            </div>

            <!-- CATATAN -->
            <div class="bg-[#FFFBEF] rounded-xl p-5">

                <h4 class="text-lg font-bold text-yellow-600 mb-3">
                    Catatan Tambahan
                </h4>

                <div class="text-sm text-gray-700 leading-relaxed">

                    {{ $patient->catatan }}

                </div>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3 mt-6">

            <a href="{{ route('patients.index') }}"
               class="bg-red-100 hover:bg-red-200 text-red-600 px-5 py-2.5 rounded-lg font-medium transition">

                Batal

            </a>

            <a href="{{ route('patients.edit', $patient->id) }}"
               class="bg-indigo-900 hover:bg-indigo-800 text-white px-5 py-2.5 rounded-lg font-medium transition">

                Edit Data

            </a>

        </div>

    </div>

</div>

@endsection