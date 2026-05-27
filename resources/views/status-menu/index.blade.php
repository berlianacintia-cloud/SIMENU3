@extends('layouts.app')

@section('title', 'Status Menu')

@section('content')

<div class="p-6">

    <!-- HEADER -->
    <div class="mb-6">

        <p class="text-gray-500 mt-1">
            Monitoring status menu pasien
        </p>
    </div>

    <!-- CARD STATISTIK -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">

        <!-- TOTAL -->
        <div class="bg-white rounded-3xl p-5 border border-green-200 shadow-sm">
            <div class="flex items-center gap-4">

                <div class="bg-green-100 p-4 rounded-2xl text-2xl">
                    👤
                </div>

                <div>
                    <p class="text-green-700 font-semibold">
                        Total Pasien
                    </p>

                    <h2 class="text-4xl font-bold text-[#124265]">
                        {{ $menus->count() }}
                    </h2>
                </div>

            </div>
        </div>

        <!-- SIAP -->
        <div class="bg-white rounded-3xl p-5 border border-yellow-200 shadow-sm">
            <div class="flex items-center gap-4">

                <div class="bg-yellow-100 p-4 rounded-2xl text-2xl">
                    🍽️
                </div>

                <div>
                    <p class="text-yellow-700 font-semibold">
                        Siap
                    </p>

                    <h2 class="text-4xl font-bold text-[#124265]">
                        {{ $menus->where('status_menu', 'Siap')->count() }}
                    </h2>
                </div>

            </div>
        </div>

        <!-- DIMASAK -->
        <div class="bg-white rounded-3xl p-5 border border-red-200 shadow-sm">
            <div class="flex items-center gap-4">

                <div class="bg-red-100 p-4 rounded-2xl text-2xl">
                    👨‍🍳
                </div>

                <div>
                    <p class="text-red-700 font-semibold">
                        Dimasak
                    </p>

                    <h2 class="text-4xl font-bold text-[#124265]">
                        {{ $menus->where('status_menu', 'Dimasak')->count() }}
                    </h2>
                </div>

            </div>
        </div>

        <!-- SELESAI -->
        <div class="bg-white rounded-3xl p-5 border border-blue-200 shadow-sm">
            <div class="flex items-center gap-4">

                <div class="bg-blue-100 p-4 rounded-2xl text-2xl">
                    ✅
                </div>

                <div>
                    <p class="text-blue-700 font-semibold">
                        Selesai
                    </p>

                    <h2 class="text-4xl font-bold text-[#124265]">
                        {{ $menus->where('status_menu', 'Selesai')->count() }}
                    </h2>
                </div>

            </div>
        </div>

    </div>

    <!-- FILTER -->
    <div class="flex flex-col md:flex-row gap-4 mb-8">

        <!-- SEARCH -->
        <div class="w-full md:w-1/3">
            <input
                type="text"
                placeholder="Cari pasien..."
                class="w-full border border-gray-300 rounded-2xl px-5 py-3"
            >
        </div>

         <!-- BANGSAL -->
        <div class="w-full md:w-1/4">
            <select class="w-full border border-gray-300 rounded-2xl px-5 py-3">

                <option>Semua Bangsal</option>

                <option>Mawar</option>

                <option>Tulip</option>

            </select>
        </div>

        <!-- TANGGAL -->
        <div class="w-full md:w-1/4">

            <form method="GET" action="{{ route('status-menu') }}">

                <input
                    type="date"
                    name="tanggal"
                    value="{{ request('tanggal', date('Y-m-d')) }}"
                    onchange="this.form.submit()"
                    class="w-full border border-gray-300 rounded-2xl px-5 py-3"
                >

            </form>

        </div>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <!-- HEAD -->
                <thead class="bg-[#124265] text-white">

                    <tr>

                        <th class="px-6 py-4 text-left">
                            No
                        </th>

                        <th class="px-6 py-4 text-left">
                            Nama Pasien
                        </th>

                        <th class="px-6 py-4 text-left">
                            No RM
                        </th>

                        <th class="px-6 py-4 text-left">
                            Nomor Kamar
                        </th>

                        <th class="px-6 py-4 text-left">
                            Bangsal
                        </th>

                        <th class="px-6 py-4 text-left">
                            Menu Makanan
                        </th>

                        <th class="px-6 py-4 text-left">
                            Jadwal
                        </th>

                        <th class="px-6 py-4 text-left">
                            Status
                        </th>

                        <th class="px-6 py-4 text-left">
                            Label
                        </th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-gray-200">

                    @foreach($menus as $menu)

                    <tr class="hover:bg-gray-50 transition">

                        <!-- NO -->
                        <td class="px-6 py-5">
                            {{ $loop->iteration }}
                        </td>

                        <!-- NAMA -->
                        <td class="px-6 py-5 font-semibold text-[#124265]">
                            {{ $menu->patient->nama }}
                        </td>

                        <!-- NO RM -->
<td class="px-6 py-5">
    {{ $menu->patient->no_rm }}
</td>

<!-- NOMOR KAMAR -->
<td class="px-6 py-5">
    {{ $menu->patient->ruangan }}
</td>

<!-- BANGSAL -->
<td class="px-6 py-5">
    {{ $menu->patient->kelas }}
</td>

                        <!-- DIET -->
                        <td class="px-6 py-5">
                            {{ $menu->jenis_diet }}
                        </td>

                        <!-- JADWAL -->
                        <td class="px-6 py-5">
                            {{ $menu->jadwal_makan }}
                        </td>

                        <!-- STATUS -->
                        <td class="px-6 py-5">

                            <form action="{{ route('status-menu.update', $menu->id) }}" method="POST">
                                @csrf

                                <select
                                    name="status_menu"
                                    onchange="this.form.submit()"
                                    class="
                                        rounded-xl px-4 py-2 border text-sm font-semibold

                                        @if($menu->status_menu == 'Siap')
                                            bg-green-100 text-green-700 border-green-300

                                        @elseif($menu->status_menu == 'Dimasak')
                                            bg-yellow-100 text-yellow-700 border-yellow-300

                                        @elseif($menu->status_menu == 'Selesai')
                                            bg-blue-100 text-blue-700 border-blue-300
                                        @endif
                                    "
                                >

                                    <option value="Siap"
                                        {{ $menu->status_menu == 'Siap' ? 'selected' : '' }}>
                                        Siap
                                    </option>

                                    <option value="Dimasak"
                                        {{ $menu->status_menu == 'Dimasak' ? 'selected' : '' }}>
                                        Dimasak
                                    </option>

                                    <option value="Selesai"
                                        {{ $menu->status_menu == 'Selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>

                                </select>

                            </form>

                        </td>

            <!-- CETAK -->
<td class="px-6 py-5">

    <button
        type="button"

        onclick='openPrintModal(
            "{{ $menu->patient->nama }}",
            "{{ $menu->patient->ruangan }}",
            "{{ $menu->patient->kelas }}",
            "{{ $menu->jenis_diet }}",
            "{{ date("d M Y") }}",
            "{{ $menu->jadwal_makan }}",
            "{{ $menu->patient->no_rm }}"
        )'

        class="bg-sky-100 text-sky-700 px-4 py-2 rounded-xl font-semibold hover:bg-sky-200 transition relative z-10"
    >
        Cetak
    </button>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

<!-- MODAL CETAK -->
<div
    id="printModal"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50"
>

    <div class="bg-white rounded-3xl w-full max-w-md p-6 relative">

        <!-- CLOSE -->
        <button
            onclick="closePrintModal()"
            class="absolute top-4 right-4 text-2xl text-gray-400 hover:text-black"
        >
            ×
        </button>

        <!-- TITLE -->
        <h2 class="text-2xl font-bold text-[#124265] mb-6">
            Cetak Label
        </h2>

        <!-- ISI -->
        <div class="border rounded-2xl p-5 mb-5">

            <div class="grid grid-cols-2 gap-y-3 text-sm">

    <p class="text-gray-500">Nama</p>
    <p class="font-semibold" id="printNama"></p>

    <p class="text-gray-500">Nomor Kamar</p>
    <p class="font-semibold" id="printNomorKamar"></p>

    <p class="text-gray-500">Bangsal</p>
    <p class="font-semibold" id="printBangsal"></p>

    <p class="text-gray-500">Diet</p>
    <p class="font-semibold" id="printDiet"></p>

    <p class="text-gray-500">Tanggal</p>
    <p class="font-semibold" id="printTanggal"></p>

    <p class="text-gray-500">Waktu Makan</p>
    <p class="font-semibold" id="printJadwal"></p>

</div>
            </div>

            <!-- BARCODE -->
<div class="mt-6 text-center">

    <div class="flex justify-center items-end gap-[2px] h-24 overflow-hidden">

        <div class="w-[2px] h-16 bg-black"></div>
        <div class="w-[4px] h-24 bg-black"></div>
        <div class="w-[2px] h-18 bg-black"></div>
        <div class="w-[3px] h-20 bg-black"></div>
        <div class="w-[2px] h-14 bg-black"></div>
        <div class="w-[5px] h-24 bg-black"></div>
        <div class="w-[2px] h-12 bg-black"></div>
        <div class="w-[3px] h-20 bg-black"></div>
        <div class="w-[2px] h-24 bg-black"></div>
        <div class="w-[4px] h-16 bg-black"></div>
        <div class="w-[2px] h-20 bg-black"></div>
        <div class="w-[3px] h-14 bg-black"></div>
        <div class="w-[5px] h-24 bg-black"></div>
        <div class="w-[2px] h-18 bg-black"></div>
        <div class="w-[4px] h-24 bg-black"></div>
        <div class="w-[2px] h-15 bg-black"></div>
        <div class="w-[3px] h-20 bg-black"></div>
        <div class="w-[2px] h-12 bg-black"></div>
        <div class="w-[5px] h-24 bg-black"></div>
        <div class="w-[2px] h-16 bg-black"></div>
        <div class="w-[3px] h-20 bg-black"></div>
        <div class="w-[2px] h-24 bg-black"></div>
        <div class="w-[4px] h-18 bg-black"></div>
        <div class="w-[2px] h-20 bg-black"></div>
        <div class="w-[5px] h-24 bg-black"></div>
        <div class="w-[2px] h-14 bg-black"></div>
        <div class="w-[4px] h-20 bg-black"></div>
        <div class="w-[2px] h-24 bg-black"></div>
        <div class="w-[3px] h-18 bg-black"></div>
        <div class="w-[5px] h-24 bg-black"></div>
        <div class="w-[2px] h-12 bg-black"></div>
        <div class="w-[4px] h-20 bg-black"></div>
        <div class="w-[2px] h-24 bg-black"></div>

    </div>

    <!-- KODE -->
    <p
    id="printNoRM"
    class="text-sm tracking-[6px] mt-4 text-gray-700 font-medium"
></p>

</div>

        <!-- PRINTER -->
        <div class="mb-5">

            <label class="text-sm font-medium text-gray-600">
                Pilih Printer
            </label>

            <select class="w-full border rounded-xl px-4 py-3 mt-2">

                <option>Printer Dapur</option>
                <option>Printer Gizi</option>

            </select>

        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3">

            <button
                onclick="closePrintModal()"
                class="px-5 py-2 rounded-xl border"
            >
                Batal
            </button>

            <button
                onclick="showSuccessModal()"
                class="bg-[#124265] text-white px-5 py-2 rounded-xl"
            >
                Cetak Sekarang
            </button>

        </div>

    </div>

</div>

<!-- MODAL SUKSES -->
<div
    id="successModal"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50"
>

    <div class="bg-white rounded-3xl w-full max-w-md p-8 text-center">

        <!-- ICON -->
        <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">

            <span class="text-white text-5xl">
                ✓
            </span>

        </div>

        <!-- TEXT -->
        <h2 class="text-3xl font-bold mb-3">
            Label berhasil dicetak.
        </h2>

        <p class="text-gray-500 mb-6">
            Silakan tempelkan label pada tray makanan pasien.
        </p>

        <!-- BUTTON -->
        <button
            onclick="closeSuccessModal()"
            class="bg-[#124265] text-white px-10 py-3 rounded-xl"
        >
            OK
        </button>

    </div>

</div>

<!-- SCRIPT -->
<script>

function openPrintModal(
    nama,
    ruangan,
    bangsal,
    diet,
    tanggal,
    jadwal,
    norm
) {

    document.getElementById('printNama').innerText = nama;
    document.getElementById('printNomorKamar').innerText = ruangan;
    document.getElementById('printBangsal').innerText = bangsal;
    document.getElementById('printDiet').innerText = diet;
    document.getElementById('printTanggal').innerText = tanggal;
    document.getElementById('printJadwal').innerText = jadwal;
    document.getElementById('printNoRM').innerText = norm;

    document.getElementById('printModal').classList.remove('hidden');
    document.getElementById('printModal').classList.add('flex');
}

function closePrintModal() {
    document.getElementById('printModal').classList.remove('flex');
    document.getElementById('printModal').classList.add('hidden');
}

function showSuccessModal() {

    closePrintModal();

    document.getElementById('successModal').classList.remove('hidden');
    document.getElementById('successModal').classList.add('flex');
}

function closeSuccessModal() {
    document.getElementById('successModal').classList.remove('flex');
    document.getElementById('successModal').classList.add('hidden');
}

</script>

@endsection