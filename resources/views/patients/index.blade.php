@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')

<div class="p-6 bg-[#EEF5F7] min-h-screen">

        {{-- HEADER --}}
        <div class="mb-6">

            <p class="text-gray-500 text-lg mt-1">
                Kelola dan Monitor Data Pasien
            </p>

        </div>

        {{-- CARD STATISTIK --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-7">

            {{-- TOTAL PASIEN --}}
            <div class="bg-[#F6FFF8] border border-green-400 rounded-2xl px-6 py-5 shadow-sm">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center">
                        <span class="text-2xl">👤</span>
                    </div>

                    <div>

                        <p class="text-green-700 font-semibold text-[15px]">
                            Total Pasien
                        </p>

                        <h2 class="text-3xl font-bold leading-none mt-1">
                            {{ $patients->count() }}
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            Pasien Terdaftar
                        </p>

                    </div>

                </div>

            </div>

            {{-- PASIEN BARU --}}
            <div class="bg-[#FFFDF2] border border-yellow-500 rounded-2xl px-6 py-5 shadow-sm">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-xl bg-yellow-100 flex items-center justify-center">
                        <span class="text-2xl">➕</span>
                    </div>

                    <div>

                        <p class="text-yellow-700 font-semibold text-[15px]">
                            Pasien Baru
                        </p>

                        <h2 class="text-3xl font-bold leading-none mt-1">
                            18
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            Bulan Ini
                        </p>

                    </div>

                </div>

            </div>

            {{-- PASIEN AKTIF --}}
            <div class="bg-[#FFF8F8] border border-red-400 rounded-2xl px-6 py-5 shadow-sm">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center">
                        <span class="text-2xl">🧑‍⚕️</span>
                    </div>

                    <div>

                        <p class="text-red-700 font-semibold text-[15px]">
                            Pasien Aktif
                        </p>

                        <h2 class="text-3xl font-bold leading-none mt-1">
                            {{ $patients->where('status', 'Aktif')->count() }}
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            Sedang Berobat
                        </p>

                    </div>

                </div>

            </div>

            {{-- PASIEN NONAKTIF --}}
            <div class="bg-[#F8FAFF] border border-blue-300 rounded-2xl px-6 py-5 shadow-sm">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                        <span class="text-2xl">👁️</span>
                    </div>

                    <div>

                        <p class="text-gray-700 font-semibold text-[15px]">
                            Pasien Nonaktif
                        </p>

                        <h2 class="text-3xl font-bold leading-none mt-1">
                            {{ $patients->where('status', 'Nonaktif')->count() }}
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            Tidak Aktif
                        </p>

                    </div>

                </div>

            </div>

        </div>

        {{-- FILTER --}}
        <div class="bg-[#F2F8FA] rounded-3xl shadow-md p-5 mb-6">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                {{-- SEARCH --}}
                <div class="md:col-span-2">

                    <input type="text"
                           placeholder="Cari nama pasien, NoRM, atau ruang"
                           class="w-full border border-gray-300 rounded-xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-300">

                </div>

                {{-- FILTER JK --}}
                <div>

                    <select class="w-full border border-gray-300 rounded-xl px-4 py-3">

                        <option>Semua</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>

                    </select>

                </div>

                {{-- FILTER STATUS --}}
                <div>

                    <select class="w-full border border-gray-300 rounded-xl px-4 py-3">

                        <option>Status</option>
                        <option>Aktif</option>
                        <option>Nonaktif</option>

                    </select>

                </div>

            </div>

        </div>

        {{-- TABLE --}}
        <div class="bg-[#F2F8FA] rounded-3xl shadow-md p-6">

            {{-- HEADER TABLE --}}
            <div class="flex items-center justify-between mb-6">

                <h2 class="text-4xl font-bold text-black">
                    Daftar Pasien
                </h2>

                <a href="{{ route('patients.create') }}"
                   class="bg-[#1F516B] hover:bg-[#173D52] text-white px-6 py-3 rounded-2xl font-semibold shadow-md transition">

                    + Tambah Pasien

                </a>

            </div>

            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full overflow-hidden rounded-2xl">

                    <thead class="bg-[#DDE6F2]">

                        <tr class="text-gray-700">

                            <th class="px-5 py-4 text-left">No</th>
                            <th class="px-5 py-4 text-left">Nama Pasien</th>
                            <th class="px-5 py-4 text-left">NoRM</th>
                            <th class="px-5 py-4 text-left">Jenis Kelamin</th>
                            <th class="px-5 py-4 text-left">Tgl Lahir</th>
                            <th class="px-5 py-4 text-left">Diagnosis</th>
                            <th class="px-5 py-4 text-left">Status</th>
                            <th class="px-5 py-4 text-left">Lihat</th>

                        </tr>

                    </thead>

                    <tbody class="bg-white">

                        @forelse($patients as $patient)

                        <tr class="border-b hover:bg-gray-50 transition">

                            <td class="px-5 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-4 font-semibold">
                                {{ strtoupper($patient->nama) }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $patient->no_rm }}
                            </td>

                            <td class="px-5 py-4">

                                @if($patient->jenis_kelamin == 'Perempuan')

                                    <span class="bg-pink-100 text-pink-500 px-4 py-1 rounded-full text-sm font-semibold">
                                        {{ $patient->jenis_kelamin }}
                                    </span>

                                @else

                                    <span class="bg-blue-100 text-blue-500 px-4 py-1 rounded-full text-sm font-semibold">
                                        {{ $patient->jenis_kelamin }}
                                    </span>

                                @endif

                            </td>

                            <td class="px-5 py-4">
                                {{ \Carbon\Carbon::parse($patient->tanggal_lahir)->format('d/m/Y') }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $patient->diagnosa }}
                            </td>

                            <td class="px-5 py-4">

                                <span class="bg-green-100 text-green-600 px-4 py-1 rounded-full text-sm font-semibold">
                                    {{ $patient->status }}
                                </span>

                            </td>

                            <td class="px-5 py-4">

                                <a href="{{ route('patients.show', $patient->id) }}"
                                   class="text-blue-700 font-semibold hover:underline">

                                    Detail

                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8"
                                class="text-center py-8 text-gray-500">

                                Belum ada data pasien

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection