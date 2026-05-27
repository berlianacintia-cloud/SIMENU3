@extends('layouts.app')

@section('title', 'Laporan')

@section('content')

<div class="p-6">

    <!-- HEADER -->
    <div class="mb-6">
    </div>

    <!-- CARD -->
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
<form method="GET" action="{{ route('laporan') }}">

    <div class="flex flex-col md:flex-row gap-4 mb-8">

        <!-- SEARCH -->
        <div class="w-full md:w-1/3">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama pasien / No RM..."
                class="w-full border border-gray-300 rounded-2xl px-5 py-3"
            >

        </div>

        <!-- BANGSAL -->
<div class="w-full md:w-1/4">

    <select
        name="kelas"
        onchange="this.form.submit()"
        class="w-full border border-gray-300 rounded-2xl px-5 py-3"
    >

        <option value="">
            Semua Bangsal
        </option>

        @foreach($bangsals as $bangsal)

            <option
                value="{{ $bangsal }}"
                {{ request('kelas') == $bangsal ? 'selected' : '' }}
            >
                {{ $bangsal }}
            </option>

        @endforeach

    </select>

</div>

        <!-- TANGGAL -->
        <div class="w-full md:w-1/4">

            <input
                type="date"
                name="tanggal"
                value="{{ request('tanggal', date('Y-m-d')) }}"
                onchange="this.form.submit()"
                class="w-full border border-gray-300 rounded-2xl px-5 py-3"
            >

        </div>

        <!-- BUTTON SEARCH -->
        <div>

            <button
                type="submit"
                class="bg-[#124265] text-white px-6 py-3 rounded-2xl"
            >
                Cari
            </button>

        </div>

    </div>

</form>

    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <!-- HEAD -->
                <thead class="bg-[#124265] text-white">

                    <tr>

                        <th class="px-6 py-4 text-left">No</th>
                        <th class="px-6 py-4 text-left">Nama Pasien</th>
                        <th class="px-6 py-4 text-left">No RM</th>
                        <th class="px-6 py-4 text-left">Nomor Kamar</th>
                        <th class="px-6 py-4 text-left">Bangsal</th>
                        <th class="px-6 py-4 text-left">Menu Makanan</th>
                        <th class="px-6 py-4 text-left">Jadwal</th>
                        <th class="px-6 py-4 text-left">Tanggal</th>
                        <th class="px-6 py-4 text-left">Status</th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-gray-200">

                    @foreach($menus as $menu)

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-5">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-5 font-semibold text-[#124265]">
                            {{ $menu->patient->nama }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $menu->patient->no_rm }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $menu->patient->ruangan }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $menu->patient->kelas}}
                        </td>

                        <td class="px-6 py-5">
                            {{ $menu->jenis_diet }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $menu->jadwal_makan }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $menu->created_at->format('d M Y') }}
                        </td>

                        <td class="px-6 py-5">

                            <span class="
                                px-4 py-2 rounded-xl text-sm font-semibold

                                @if($menu->status_menu == 'Siap')
                                    bg-green-100 text-green-700

                                @elseif($menu->status_menu == 'Dimasak')
                                    bg-yellow-100 text-yellow-700

                                @elseif($menu->status_menu == 'Selesai')
                                    bg-blue-100 text-blue-700
                                @endif
                            ">

                                {{ $menu->status_menu }}

                            </span>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <!-- BUTTON -->
<div class="flex justify-end gap-4 mt-8">

    <button
        onclick="openCsvModal()"
        class="bg-[#124265] text-white px-6 py-3 rounded-2xl"
    >
        Export CSV
    </button>

    <button
        onclick="openPdfModal()"
        class="bg-[#124265] text-white px-6 py-3 rounded-2xl"
    >
        Cetak PDF
    </button>

</div>

</div>

<!-- MODAL CSV -->
<div
    id="csvModal"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50"
>

    <div class="bg-white rounded-3xl w-full max-w-xl p-6 relative">

        <!-- CLOSE -->
        <button
            onclick="closeCsvModal()"
            class="absolute top-5 right-5 text-4xl text-gray-400"
        >
            ×
        </button>

        <h2 class="text-3xl font-bold text-[#124265] mb-2">
            Export Data CSV
        </h2>

        <p class="text-gray-500 mb-8">
            Pilih data yang ingin diexport ke file CSV.
        </p>

        <!-- FILTER -->
        <div class="space-y-6">

            <!-- TANGGAL -->
            <div>

                <label class="font-semibold mb-2 block">
                    Rentang Tanggal
                </label>

                <div class="grid grid-cols-2 gap-4">

                    <input
                        type="date"
                        class="border rounded-2xl px-4 py-3"
                    >

                    <input
                        type="date"
                        class="border rounded-2xl px-4 py-3"
                    >

                </div>

            </div>

            <!-- BANGSAL -->
            <div>

                <label class="font-semibold mb-2 block">
                    Bangsal
                </label>

                <select class="w-full border rounded-2xl px-4 py-3">

                    <option>Semua Bangsal</option>

                    @foreach($bangsals as $bangsal)

                        <option>
                            {{ $bangsal }}
                        </option>

                    @endforeach

                </select>

            </div>

            <!-- PENYAKIT -->
<div>

    <label class="font-semibold mb-2 block">
        Penyakit
    </label>

    <select
        id="csvPenyakit"
        class="w-full border rounded-2xl px-4 py-3"
    >

        <option value="">
            Semua Penyakit
        </option>

        @foreach($menus->unique('patient.diagnosa') as $menu)

            <option>
                {{ $menu->patient->diagnosa }}
            </option>

        @endforeach

    </select>

</div>

            <!-- DIET -->
            <div>

                <label class="font-semibold mb-2 block">
                    Diet
                </label>

                <select class="w-full border rounded-2xl px-4 py-3">

                    <option>Semua Diet</option>

                    @foreach($menus->unique('jenis_diet') as $menu)

                        <option>
                            {{ $menu->jenis_diet }}
                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-4 mt-8">

            <button
                onclick="closeCsvModal()"
                class="border px-6 py-3 rounded-2xl"
            >
                Batal
            </button>

            <button
  onclick="openPreviewCsv()"
    class="bg-[#124265] text-white px-6 py-3 rounded-2xl"
>
    Download CSV
</button>

        </div>

    </div>

</div>

<!-- PREVIEW CSV -->
<div
    id="previewCsvModal"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50 overflow-y-auto p-6"
>

    <div class="bg-white rounded-2xl w-full max-w-5xl p-6 relative">

        <!-- CLOSE -->
        <button
            onclick="closePreviewCsv()"
            class="absolute top-5 right-5 text-4xl text-gray-400"
        >
            ×
        </button>

        <h2 class="text-2xl font-bold text-[#124265] mb-5">
            Preview CSV Laporan
        </h2>

        <!-- TABLE -->
        <div class="overflow-x-auto border border-gray-300 rounded-lg">

            <table class="w-full">

                <thead class="bg-green-700 text-white text-sm">

                    <tr>

                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama Pasien</th>
                        <th class="px-6 py-4">No RM</th>
                        <th class="px-6 py-4">Nomor Kamar</th>
                        <th class="px-6 py-4">Bangsal</th>
                        <th class="px-6 py-4">Diagnosa</th>
                        <th class="px-6 py-4">Menu Makanan</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($menus as $menu)

                    <tr
    class="border-b csv-row"

    data-bangsal="{{ $menu->patient->kelas }}"
    data-penyakit="{{ $menu->patient->diagnosa }}"
    data-diet="{{ $menu->jenis_diet }}"
>

                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $menu->patient->nama }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $menu->patient->no_rm }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $menu->patient->ruangan }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $menu->patient->kelas }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $menu->patient->diagnosa }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $menu->jenis_diet }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <!-- BUTTON -->
        <div class="flex justify-between items-center mt-6">
            
        <p class="text-sm text-gray-500">
    Format CSV siap diunduh dan dibuka di Microsoft Excel.
</p>

            <button
    onclick="downloadCsv()"
    class="bg-[#124265] text-white px-6 py-3 rounded-2xl"
>
    Download CSV
</button>

        </div>

    </div>

</div>

<!-- SUCCESS CSV -->
<div
    id="successCsvModal"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50"
>

    <div class="bg-white rounded-3xl w-full max-w-xl p-10 text-center">

        <div class="w-32 h-32 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-8">

            <span class="text-white text-7xl">
                ✓
            </span>

        </div>

        <h2 class="text-4xl font-bold mb-4">
            Export CSV Berhasil
        </h2>

        <p class="text-gray-500 text-lg mb-8">
            File CSV berhasil didownload.
        </p>

        <button
            onclick="closeSuccessCsv()"
            class="bg-[#124265] text-white px-10 py-4 rounded-2xl"
        >
            OK
        </button>

    </div>

</div>

<!-- MODAL PDF -->
<div
    id="pdfModal"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50 p-4"
>

    <div class="bg-white rounded-3xl w-full max-w-3xl p-6 relative">

        <!-- CLOSE -->
        <button
            onclick="closePdfModal()"
            class="absolute top-4 right-5 text-4xl text-gray-400"
        >
            ×
        </button>

        <!-- TITLE -->
        <h2 class="text-2xl font-bold text-[#124265] mb-1">
            Cetak PDF
        </h2>

        <p class="text-gray-500 mb-6">
            Atur parameter laporan yang akan dicetak
        </p>

        <!-- FORM -->
        <div class="grid grid-cols-2 gap-5">

            <!-- RENTANG TANGGAL -->
            <div class="col-span-2">

                <label class="font-semibold mb-2 block">
                    Rentang Tanggal
                </label>

                <div class="flex gap-4">

                    <input
                        type="date"
                        class="w-full border rounded-2xl px-4 py-2.5"
                    >

                    <input
                        type="date"
                        class="w-full border rounded-2xl px-4 py-2.5"
                    >

                </div>

            </div>

            <!-- BANGSAL -->
            <div>

                <label class="font-semibold mb-2 block">
                    Bangsal
                </label>

                <select
                    class="w-full border rounded-2xl px-4 py-2.5"
                >

                    <option value="">
                        Semua Bangsal
                    </option>

                    @foreach($bangsals as $bangsal)

                        <option>
                            {{ $bangsal }}
                        </option>

                    @endforeach

                </select>

            </div>

            <!-- PENYAKIT -->
            <div>

                <label class="font-semibold mb-2 block">
                    Penyakit
                </label>

                <select
                    id="pdfPenyakit"
                    class="w-full border rounded-2xl px-4 py-2.5"
                >

                    <option value="">
                        Semua Penyakit
                    </option>

                    @foreach($menus->unique('patient.diagnosa') as $menu)

                        <option>
                            {{ $menu->patient->diagnosa }}
                        </option>

                    @endforeach

                </select>

            </div>

            <!-- DIET -->
            <div>

                <label class="font-semibold mb-2 block">
                    Diet
                </label>

                <select
                    id="pdfDiet"
                    class="w-full border rounded-2xl px-4 py-2.5"
                >

                    <option value="">
                        Semua Diet
                    </option>

                    @foreach($menus->unique('jenis_diet') as $menu)

                        <option>
                            {{ $menu->jenis_diet }}
                        </option>

                    @endforeach

                </select>

            </div>

            <!-- ORIENTASI -->
            <div>

                <label class="font-semibold mb-2 block">
                    Orientasi
                </label>

                <select
                    class="w-full border rounded-2xl px-4 py-2.5"
                >

                    <option>Portrait</option>
                    <option>Landscape</option>

                </select>

            </div>

            <!-- UKURAN KERTAS -->
            <div class="col-span-2">

                <label class="font-semibold mb-2 block">
                    Ukuran Kertas
                </label>

                <select
                    class="w-full border rounded-2xl px-4 py-2.5"
                >

                    <option>A4</option>
                    <option>F4</option>

                </select>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3 mt-8">

            <button
                onclick="closePdfModal()"
                class="border px-6 py-2.5 rounded-2xl"
            >
                Batal
            </button>

            <button
                onclick="openPreviewPdf()"
                class="bg-[#124265] text-white px-6 py-2.5 rounded-2xl"
            >
                Preview PDF
            </button>

        </div>

    </div>

</div>

<!-- PREVIEW PDF -->
<div
    id="previewPdfModal"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50 overflow-y-auto p-6"
>

    <div class="bg-white rounded-3xl w-full max-w-6xl p-10 relative">

        <button
            onclick="closePreviewPdf()"
            class="absolute top-5 right-5 text-4xl text-gray-400"
        >
            ×
        </button>

        <h2 class="text-2xl font-bold text-[#124265] mb-8">
            Preview PDF Laporan
        </h2>

        <!-- HEADER -->
        <div class="flex justify-between items-start border-b pb-6 mb-8">

            <div>

                <h2 class="text-2xl font-bold text-[#124265]">
                    SIMENU
                </h2>

                <p class="text-gray-500 mt-2">
                    Sistem Informasi Menu Pasien
                </p>

            </div>

            <div class="text-right">

                <h3 class="text-2xl font-bold">
                    LAPORAN DISTRIBUSI MENU
                </h3>

                <p class="text-gray-500 mt-2">
                    {{ date('d M Y') }}
                </p>

            </div>

        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto border rounded-2xl">

            <table class="w-full">

                <thead class="bg-[#124265] text-white">

                    <tr>

                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">No RM</th>
                        <th class="px-6 py-4">Kamar</th>
                        <th class="px-6 py-4">Bangsal</th>
                        <th class="px-6 py-4">Diet</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($menus as $menu)

                    <tr
    class="border-b csv-row"

    data-bangsal="{{ $menu->patient->kelas }}"
    data-penyakit="{{ $menu->patient->diagnosa }}"
    data-diet="{{ $menu->jenis_diet }}"
>

                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $menu->patient->nama }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $menu->patient->no_rm }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $menu->patient->ruangan }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $menu->patient->kelas }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $menu->jenis_diet }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-4 mt-8">

            <button
    onclick="downloadPdf()"
    class="border px-6 py-3 rounded-2xl"
>
    Download
</button>

            <button
    onclick="printPdf()"
    class="bg-[#124265] text-white px-6 py-3 rounded-2xl"
>
    Print
</button>

        </div>

    </div>

</div>

<!-- SUCCESS PDF -->
<div
    id="successPdfModal"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50"
>

    <div class="bg-white rounded-3xl w-full max-w-xl p-10 text-center">

        <div class="w-32 h-32 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-8">

            <span class="text-white text-6xl">
                🖨
            </span>

        </div>

        <h2 class="text-4xl font-bold mb-4">
            PDF Sedang Dicetak
        </h2>

        <p class="text-gray-500 text-lg mb-8">
            Silakan tunggu proses pencetakan selesai.
        </p>

        <button
            onclick="closeSuccessPdf()"
            class="bg-[#124265] text-white px-10 py-4 rounded-2xl"
        >
            OK
        </button>

    </div>

</div>
<script>

    // =========================
    // CSV
    // =========================

    function openCsvModal() {

        document.getElementById('csvModal')
            .classList.remove('hidden');

        document.getElementById('csvModal')
            .classList.add('flex');
    }

    function closeCsvModal() {

        document.getElementById('csvModal')
            .classList.remove('flex');

        document.getElementById('csvModal')
            .classList.add('hidden');
    }

    function openPreviewCsv() {

        closeCsvModal();

        document.getElementById('previewCsvModal')
            .classList.remove('hidden');

        document.getElementById('previewCsvModal')
            .classList.add('flex');
    }

    function closePreviewCsv() {

        document.getElementById('previewCsvModal')
            .classList.remove('flex');

        document.getElementById('previewCsvModal')
            .classList.add('hidden');
    }

    function downloadCsv() {

        closePreviewCsv();

        document.getElementById('successCsvModal')
            .classList.remove('hidden');

        document.getElementById('successCsvModal')
            .classList.add('flex');
    }

    function closeSuccessCsv() {

        document.getElementById('successCsvModal')
            .classList.remove('flex');

        document.getElementById('successCsvModal')
            .classList.add('hidden');
    }


    // =========================
    // PDF
    // =========================

    function openPdfModal() {

        document.getElementById('pdfModal')
            .classList.remove('hidden');

        document.getElementById('pdfModal')
            .classList.add('flex');
    }

    function closePdfModal() {

        document.getElementById('pdfModal')
            .classList.remove('flex');

        document.getElementById('pdfModal')
            .classList.add('hidden');
    }

    function openPreviewPdf() {

        closePdfModal();

        document.getElementById('previewPdfModal')
            .classList.remove('hidden');

        document.getElementById('previewPdfModal')
            .classList.add('flex');
    }

    function closePreviewPdf() {

        document.getElementById('previewPdfModal')
            .classList.remove('flex');

        document.getElementById('previewPdfModal')
            .classList.add('hidden');
    }

    // PRINT PDF
    function printPdf() {

        closePreviewPdf();

        document.getElementById('successPdfModal')
            .classList.remove('hidden');

        document.getElementById('successPdfModal')
            .classList.add('flex');
    }

    function closeSuccessPdf() {

        document.getElementById('successPdfModal')
            .classList.remove('flex');

        document.getElementById('successPdfModal')
            .classList.add('hidden');
    }

    // DOWNLOAD PDF
    function downloadPdf() {

        closePreviewPdf();

        document.getElementById('successDownloadPdfModal')
            .classList.remove('hidden');

        document.getElementById('successDownloadPdfModal')
            .classList.add('flex');
    }

    function closeSuccessDownloadPdf() {

        document.getElementById('successDownloadPdfModal')
            .classList.remove('flex');

        document.getElementById('successDownloadPdfModal')
            .classList.add('hidden');
    }

</script>

<!-- SUCCESS DOWNLOAD PDF -->
<div
    id="successDownloadPdfModal"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50"
>

    <div class="bg-white rounded-3xl w-full max-w-xl p-10 text-center">

        <div class="w-32 h-32 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-8">

            <span class="text-white text-7xl">
                ✓
            </span>

        </div>

        <h2 class="text-4xl font-bold mb-4">
            PDF Berhasil Didownload
        </h2>

        <p class="text-gray-500 text-lg mb-8">
            File PDF berhasil disimpan.
        </p>

        <button
            onclick="closeSuccessDownloadPdf()"
            class="bg-[#124265] text-white px-10 py-4 rounded-2xl"
        >
            OK
        </button>

    </div>

</div>

@endsection