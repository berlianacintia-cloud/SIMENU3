@extends('layouts.app')

@section('title', 'Cetak Label')

@section('content')

<div class="p-6">

    {{-- HEADER --}}
    <div class="mb-6">
        <p class="text-gray-500 mt-1">
            Cetak label distribusi makanan pasien
        </p>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- KIRI --}}
        <div class="xl:col-span-2 space-y-6">

            {{-- FILTER --}}
            <div class="bg-white rounded-2xl shadow-sm border p-6">

                <h2 class="text-2xl font-bold text-[#0B3C5D] mb-6">
                    Filter Data
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                    {{-- TANGGAL --}}
                    <div>
                        <label class="text-sm text-gray-600 mb-2 block">
                            Tanggal
                        </label>

                        <input
                            type="date"
                            id="filterTanggal"
                            class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        >
                    </div>

                    {{-- JADWAL --}}
                    <div>
                        <label class="text-sm text-gray-600 mb-2 block">
                            Jadwal Makan
                        </label>

                        <select
                            id="filterJadwal"
                            class="w-full border rounded-xl px-4 py-3 focus:outline-none"
                        >
                            <option value="">Semua</option>
                            <option value="Pagi">Pagi</option>
                            <option value="Siang">Siang</option>
                            <option value="Malam">Malam</option>
                        </select>
                    </div>

                    {{-- BANGSAL --}}
                    <div>
                        <label class="text-sm text-gray-600 mb-2 block">
                            Bangsal
                        </label>

                        <select
                            id="filterBangsal"
                            class="w-full border rounded-xl px-4 py-3 focus:outline-none"
                        >
                            <option value="">Semua</option>
                            <option value="Anggrek">Anggrek</option>
                            <option value="Mawar">Mawar</option>
                            <option value="Melati">Melati</option>
                        </select>
                    </div>

                    {{-- BUTTON --}}
                    <div class="flex items-end">
                        <button
    class="w-full bg-[#0B3C5D] hover:bg-[#072b42] text-white rounded-xl py-3 font-semibold"
>
                            Tampilkan
                        </button>
                    </div>

                </div>

                {{-- BUTTON ACTION --}}
                <div class="flex flex-wrap gap-3 mt-6">

                    <button
                        onclick="printSelected()"
                        class="bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-xl font-semibold"
                    >
                        Cetak Label Terpilih
                    </button>

                    <button
                        onclick="printAll()"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-xl font-semibold"
                    >
                        Cetak Semua
                    </button>

                </div>

            </div>

            {{-- TABLE --}}
            <div class="bg-white rounded-2xl shadow-sm border overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-[#0B3C5D] text-white">
                        <tr>
                            <th class="p-4">
                                <input type="checkbox" id="checkAll">
                            </th>
                            <th class="p-4 text-left">No</th>
                            <th class="p-4 text-left">Nama Pasien</th>
                            <th class="p-4 text-left">No RM</th>
                            <th class="p-4 text-left">Ruangan</th>
                            <th class="p-4 text-left">Bangsal</th>
                            <th class="p-4 text-left">Diet</th>
                            <th class="p-4 text-left">Jadwal</th>
                            <th class="p-4 text-left">Tanggal</th>
                            <th class="p-4 text-left min-w-[120px]">Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="patientTable">

@foreach($menus as $item)

<tr
    class="border-b patient-row"
    data-tanggal="{{ $item->created_at->format('Y-m-d') }}"
    data-jadwal="{{ $item->jadwal_makan }}"
    data-bangsal="{{ $item->patient->kelas }}"
    data-nama="{{ $item->patient->nama }}"
    data-kamar="{{ $item->patient->ruangan }}"
    data-diet="{{ $item->jenis_diet }}"
    data-norm="{{ $item->patient->no_rm }}"
>

    <td class="p-4">
        <input type="checkbox" class="patient-check">
    </td>

    <td class="p-4">
        {{ $loop->iteration }}
    </td>

    <td class="p-4 font-semibold">
        {{ $item->patient->nama }}
    </td>

    <td class="p-4">
        {{ $item->patient->no_rm }}
    </td>

    <td class="p-4">
        {{ $item->patient->ruangan }}
    </td>

    <td class="p-4">
        {{ $item->patient->kelas }}
    </td>

    <td class="p-4">
        {{ $item->jenis_diet }}
    </td>

    <td class="p-4">
        {{ $item->jadwal_makan }}
    </td>

    <td class="p-4">
        {{ $item->created_at->format('d M Y') }}
    </td>

    <td class="p-4">

        <button
            onclick="previewLabel(
                '{{ $item->patient->nama }}',
                '{{ $item->patient->ruangan }}',
                '{{ $item->patient->kelas }}',
                '{{ $item->jenis_diet }}',
                '{{ $item->created_at->format('d M Y') }}',
                '{{ $item->jadwal_makan }}',
                '{{ $item->patient->no_rm }}'
            )"
            class="bg-blue-100 text-blue-600 px-3 py-2 rounded-lg text-sm whitespace-nowrap"
        >
            Preview
        </button>

    </td>

</tr>
@endforeach

                    </tbody>

                </table>

            </div>

        </div>

        {{-- PREVIEW --}}
        <div>

            <div class="bg-white rounded-2xl shadow-sm border p-6 sticky top-6">

                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-[#0B3C5D]">
                        Preview Label
                    </h2>
                </div>

                {{-- LABEL --}}
                <div
    id="printLabel"
    class="border rounded-2xl p-4 bg-white"
>

                    <div class="space-y-2 text-sm">

                        <div class="flex justify-between">
                            <span class="text-gray-500">Nama</span>
                            <span class="font-bold" id="previewNama">
                                Gino
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Nomor Kamar</span>
                            <span class="font-bold" id="previewKamar">
                                B-34
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Bangsal</span>
                            <span class="font-bold" id="previewBangsal">
                                Anggrek
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Diet</span>
                            <span class="font-bold" id="previewDiet">
                                Bubur
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Tanggal</span>
                            <span class="font-bold" id="previewTanggal">
                                26 May 2026
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Waktu Makan</span>
                            <span class="font-bold" id="previewJadwal">
                                Siang
                            </span>
                        </div>

                    </div>

                    {{-- BARCODE --}}
                    <div class="text-center mt-10">

                        <div class="flex justify-center">
                            <img
                                src="https://barcode.tec-it.com/barcode.ashx?data=8765432&code=Code128"
                                id="barcodeImage"
                                class="h-14"
                            >
                        </div>

                        <p
                            class="tracking-[6px] mt-1 text-sm"
                            id="previewBarcode"
                        >
                            8765432
                        </p>

                    </div>

                </div>

                {{-- PRINTER --}}
                <div class="mt-6">

                    <label class="text-sm text-gray-600 block mb-2">
                        Pilih Printer
                    </label>

                    <select
                        class="w-full border rounded-xl px-4 py-3"
                    >
                        <option>Printer Dapur</option>
                        <option>Printer Gizi</option>
                    </select>

                </div>

                {{-- BUTTON --}}
                <div class="flex justify-end gap-3 mt-4">

                    <button
                        class="border px-5 py-3 rounded-xl"
                    >
                        Batal
                    </button>

                    <button
                        onclick="printLabelOnly()"
                        class="bg-[#0B3C5D] hover:bg-[#072b42] text-white px-5 py-3 rounded-xl font-semibold"
                    >
                        Cetak Sekarang
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

const rows = document.querySelectorAll('.patient-row');


// ================= PREVIEW LABEL =================

function previewLabel(
    nama,
    kamar,
    bangsal,
    diet,
    tanggal,
    jadwal,
    norm
) {

    document.getElementById('previewNama').innerText = nama;
    document.getElementById('previewKamar').innerText = kamar;
    document.getElementById('previewBangsal').innerText = bangsal;
    document.getElementById('previewDiet').innerText = diet;
    document.getElementById('previewTanggal').innerText = tanggal;
    document.getElementById('previewJadwal').innerText = jadwal;
    document.getElementById('previewBarcode').innerText = norm;

    document.getElementById('barcodeImage').src =
        `https://barcode.tec-it.com/barcode.ashx?data=${norm}&code=Code128`;
}


// ================= FILTER =================

function applyFilters() {

    const tanggal =
        document.getElementById('filterTanggal').value;

    const jadwal =
        document.getElementById('filterJadwal').value;

    const bangsal =
        document.getElementById('filterBangsal').value;

    rows.forEach(row => {

        const rowTanggal =
            row.dataset.tanggal;

        const rowJadwal =
            row.dataset.jadwal;

        const rowBangsal =
            row.dataset.bangsal;

        let show = true;

        if (
            tanggal &&
            rowTanggal !== tanggal
        ) {
            show = false;
        }

        if (
            jadwal &&
            rowJadwal !== jadwal
        ) {
            show = false;
        }

        if (
            bangsal &&
            rowBangsal !== bangsal
        ) {
            show = false;
        }

        row.style.display =
            show ? '' : 'none';

    });

}


// ================= AUTO FILTER =================

document
.getElementById('filterTanggal')
.addEventListener('change', applyFilters);

document
.getElementById('filterJadwal')
.addEventListener('change', applyFilters);

document
.getElementById('filterBangsal')
.addEventListener('change', applyFilters);


// ================= CHECK ALL =================

document
.getElementById('checkAll')
.addEventListener('change', function() {

    let checks =
        document.querySelectorAll('.patient-check');

    checks.forEach(check => {

        check.checked = this.checked;

    });

});


// ================= PRINT LABEL ONLY =================

function printLabelOnly() {

    const labelContent =
        document.getElementById('printLabel').innerHTML;

    const printWindow =
        window.open('', '', 'width=600,height=700');

    printWindow.document.write(`

        <html>

        <head>

            <title>Cetak Label</title>

            <style>

                body{
                    font-family: Arial;
                    padding:20px;
                }

                .label-box{
                    border:1px solid #ddd;
                    border-radius:16px;
                    padding:20px;
                }

            </style>

        </head>

        <body>

            <div class="label-box">

                ${labelContent}

            </div>

        </body>

        </html>

    `);

    printWindow.document.close();

    printWindow.focus();

    printWindow.print();

}


// ================= CETAK TERPILIH =================

function printSelected() {

    const checkedRows =
        document.querySelectorAll(
            '.patient-check:checked'
        );

    if (checkedRows.length === 0) {

        alert('Pilih pasien terlebih dahulu');

        return;
    }

    checkedRows.forEach(check => {

        const row =
            check.closest('tr');

        previewLabel(
            row.dataset.nama,
            row.dataset.kamar,
            row.dataset.bangsal,
            row.dataset.diet,
            row.dataset.tanggal,
            row.dataset.jadwal,
            row.dataset.norm
        );

    });

    printLabelOnly();

}


// ================= CETAK SEMUA =================

function printAll() {

    rows.forEach(row => {

        if (
            row.style.display !== 'none'
        ) {

            previewLabel(
                row.dataset.nama,
                row.dataset.kamar,
                row.dataset.bangsal,
                row.dataset.diet,
                row.dataset.tanggal,
                row.dataset.jadwal,
                row.dataset.norm
            );

        }

    });

    printLabelOnly();

}

</script>

@endsection