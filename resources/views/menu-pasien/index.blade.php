@extends('layouts.app')

@section('title', 'Pengelolaan Menu Pasien')

@section('content')

<div class="p-6 bg-[#EEF5F7] min-h-screen">

    {{-- HEADER --}}
    <div class="mb-6">
        <p class="text-gray-500 mt-1 text-sm">
            Kelola menu makanan pasien
        </p>
    </div>

    {{-- CARD STATISTIK --}}
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        {{-- TOTAL --}}
        <div class="bg-[#F6FFF8] border border-green-300 rounded-2xl px-5 py-4 shadow-sm">
            

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-green-100 flex items-center justify-center text-lg">
                    👤
                </div>

                <div>

                    <p class="text-green-700 font-semibold text-sm">
                        Total Pasien
                    </p>

                    <h2 class="text-2xl font-bold">
                        256
                    </h2>

                </div>

            </div>

        </div>

        {{-- PAGI --}}
        <div class="bg-[#FFFBEA] border border-yellow-300 rounded-2xl px-5 py-4 shadow-sm">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-yellow-100 flex items-center justify-center text-lg">
                    ☀️
                </div>

                <div>

                    <p class="text-yellow-700 font-semibold text-sm">
                        Menu Pagi
                    </p>

                    <h2 class="text-2xl font-bold">
                        18
                    </h2>

                </div>

            </div>

        </div>

        {{-- SIANG --}}
        <div class="bg-[#FFF6F6] border border-red-300 rounded-2xl px-5 py-4 shadow-sm">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-red-100 flex items-center justify-center text-lg">
                    🍱
                </div>

                <div>

                    <p class="text-red-700 font-semibold text-sm">
                        Menu Siang
                    </p>

                    <h2 class="text-2xl font-bold">
                        198
                    </h2>

                </div>

            </div>

        </div>

        {{-- MALAM --}}
        <div class="bg-[#F8FAFF] border border-blue-300 rounded-2xl px-5 py-4 shadow-sm">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center text-lg">
                    🌙
                </div>

                <div>

                    <p class="text-blue-700 font-semibold text-sm">
                        Menu Malam
                    </p>

                    <h2 class="text-2xl font-bold">
                        5
                    </h2>

                </div>

            </div>

        </div>

    </div>

    {{-- FORM --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-6 mt-4">

        {{-- FORM INPUT --}}
        <div class="xl:col-span-2 bg-[#F2F8FA] rounded-3xl shadow-md p-5">

            <h2 class="text-2xl font-bold text-[#1F516B] mb-5">
                Tambah Menu Pasien
            </h2>

            <form action="{{ route('menu-pasien.store') }}" method="POST">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    {{-- PASIEN --}}
                    <div>

                        <label class="font-semibold text-sm text-[#1F516B]">
                            Nama Pasien
                        </label>

                        <select name="patient_id"
                        id="patientSelect"
    onchange="updatePatientCard()"
    class="w-full border border-gray-300 rounded-2xl px-5 py-3">

                           <option value="">Pilih Pasien</option>

                            @foreach($patients as $patient)

<option
    value="{{ $patient->id }}"
    data-nama="{{ $patient->nama }}"
    data-norm="{{ $patient->no_rm }}"
    data-kamar="{{ $patient->ruangan }}"
    data-bangsal="{{ $patient->kelas }}"
    data-diagnosis="{{ $patient->diagnosa ?? '-' }}"
    data-diet="{{ $patient->jenis_diet ?? '-' }}"
    data-alergi="{{ $patient->alergi ?? '-' }}"
>

    {{ $patient->nama }} - {{ $patient->no_rm }}

</option>

@endforeach

                        </select>

                    </div>

                    {{-- JADWAL --}}
                    <div>

                        <label class="font-semibold text-sm text-[#1F516B]">
                            Jadwal Makan
                        </label>

                        <select name="jadwal_makan"
                                class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">

                            <option>Pilih Jadwal</option>
                            <option>Pagi</option>
                            <option>Siang</option>
                            <option>Malam</option>

                        </select>

                    </div>

                    {{-- BENTUK --}}
                    <div>

                        <label class="font-semibold text-sm text-[#1F516B]">
                            Bentuk Makanan
                        </label>

                        <select name="bentuk_makanan"
                                class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">

                            <option>Pilih Bentuk</option>
                            <option>Biasa</option>
                            <option>Lunak</option>
                            <option>Saring</option>

                        </select>

                    </div>

                    {{-- KALORI --}}
                    <div>

                        <label class="font-semibold text-sm text-[#1F516B]">
                            Jumlah Kalori
                        </label>

                        <input type="text"
                               name="kalori"
                               placeholder="Masukkan kalori"
                               class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">

                    </div>

                </div>

                {{-- MENU --}}
                <div class="mt-4">

                    <label class="font-semibold text-sm text-[#1F516B]">
                        Jenis Diet / Menu Makanan
                    </label>

                    <textarea name="jenis_diet"
                              rows="3"
                              placeholder="Masukkan menu makanan"
                              class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3"></textarea>

                </div>

                {{-- CATATAN --}}
                <div class="mt-4">

                    <label class="font-semibold text-sm text-[#1F516B]">
                        Catatan Tambahan
                    </label>

                    <textarea name="catatan"
                              rows="3"
                              placeholder="Masukkan catatan"
                              class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3"></textarea>

                </div>

                {{-- BUTTON --}}
                <div class="flex justify-end gap-3 mt-6">

                    <button type="reset"
                            class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-xl text-sm font-semibold">

                        Reset

                    </button>

                    <button type="submit"
                            class="bg-[#1F516B] hover:bg-[#173D52] text-white px-6 py-3 rounded-xl text-sm font-semibold">

                        Simpan Menu

                    </button>

                </div>

            </form>

        </div>

{{-- DETAIL PASIEN --}}
<div class="bg-[#F2F8FA] rounded-[28px] shadow-sm border border-slate-200 overflow-hidden">

    {{-- HEADER --}}
    <div class="px-6 py-5 border-b border-slate-200 bg-white/40">


        <div class="flex items-center gap-4">

            {{-- ICON --}}
            <div class="w-14 h-14 rounded-2xl bg-blue-100
                        flex items-center justify-center">

                <i class="fa-solid fa-user-injured text-blue-600 text-xl"></i>

            </div>



            {{-- TITLE --}}
            <div>

                <h2 class="text-2xl font-bold text-[#1F516B] leading-none">
                    Data Pasien
                </h2>

                <p class="text-sm text-slate-500 mt-2">
                    Informasi detail pasien terpilih
                </p>

            </div>

        </div>

    </div>



    {{-- CONTENT --}}
    <div class="p-6">

        <div class="space-y-4">

            {{-- NAMA --}}
            <div class="bg-white rounded-2xl border border-slate-200 px-4 py-3">

                <div class="text-xs font-semibold text-slate-500 uppercase mb-1">
                    Nama Pasien
                </div>

                <div id="cardNama"
                     class="text-[15px] font-bold text-slate-800">

                    -

                </div>

            </div>



            {{-- NO RM --}}
            <div class="bg-white rounded-2xl border border-slate-200 px-4 py-3">

                <div class="text-xs font-semibold text-slate-500 uppercase mb-1">
                    No RM
                </div>

                <div id="cardNoRM"
                     class="text-[15px] font-semibold text-slate-800">

                    -

                </div>

            </div>



            {{-- NOMOR KAMAR --}}
            <div class="bg-white rounded-2xl border border-slate-200 px-4 py-3">

                <div class="text-xs font-semibold text-slate-500 uppercase mb-1">
                    Nomor Kamar
                </div>

                <div id="cardKamar"
                     class="text-[15px] font-semibold text-slate-800">

                    -

                </div>

            </div>



            {{-- BANGSAL --}}
            <div class="bg-white rounded-2xl border border-slate-200 px-4 py-3">

                <div class="text-xs font-semibold text-slate-500 uppercase mb-1">
                    Bangsal
                </div>

                <div id="cardBangsal"
                     class="text-[15px] font-semibold text-slate-800">

                    -

                </div>

            </div>



            {{-- DIAGNOSIS --}}
            <div class="bg-white rounded-2xl border border-slate-200 px-4 py-3">

                <div class="text-xs font-semibold text-slate-500 uppercase mb-1">
                    Diagnosis
                </div>

                <div id="cardDiagnosis"
                     class="text-[15px] font-semibold text-slate-800">

                    -

                </div>

            </div>



            {{-- DIET --}}
            <div class="bg-white rounded-2xl border border-slate-200 px-4 py-3">

                <div class="text-xs font-semibold text-slate-500 uppercase mb-1">
                    Jenis Diet
                </div>

                <div id="cardDiet"
                     class="text-[15px] font-semibold text-slate-800">

                    -

                </div>

            </div>



            {{-- ALERGI --}}
            <div class="bg-white rounded-2xl border border-slate-200 px-4 py-3">

                <div class="text-xs font-semibold text-slate-500 uppercase mb-1">
                    Alergi
                </div>

                <div id="cardAlergi"
                     class="text-[15px] font-semibold text-red-500">

                    -

                </div>

            </div>

        </div>

    </div>

</div>

{{-- DAFTAR MENU PASIEN --}}
<div class="bg-[#F2F8FA] rounded-3xl shadow-md p-5 lg:col-span-3 w-full">

    <div class="flex items-center justify-between mb-5 flex-wrap gap-3">

        <h2 class="text-3xl font-bold text-[#1F516B]">
            Daftar Menu Pasien
        </h2>

        <form method="GET"
              action="{{ route('menu-pasien.index') }}"
              class="flex gap-3 flex-wrap">

            {{-- SEARCH PASIEN --}}
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Cari nama pasien....."
                   class="border border-gray-300 rounded-xl px-4 py-2 w-72">

            {{-- FILTER BENTUK --}}
            <select name="bentuk"
                    class="border border-gray-300 rounded-xl px-4 py-2">

                <option value="">Semua Bentuk</option>

                <option value="Biasa"
                    {{ request('bentuk') == 'Biasa' ? 'selected' : '' }}>
                    Biasa
                </option>

                <option value="Lunak"
                    {{ request('bentuk') == 'Lunak' ? 'selected' : '' }}>
                    Lunak
                </option>

                <option value="Saring"
                    {{ request('bentuk') == 'Saring' ? 'selected' : '' }}>
                    Saring
                </option>

                <option value="Cair"
                    {{ request('bentuk') == 'Cair' ? 'selected' : '' }}>
                    Cair
                </option>

            </select>

            {{-- FILTER JADWAL --}}
            <select name="jadwal"
                    class="border border-gray-300 rounded-xl px-4 py-2">

                <option value="">Semua Jadwal</option>

                <option value="Pagi"
                    {{ request('jadwal') == 'Pagi' ? 'selected' : '' }}>
                    Pagi
                </option>

                <option value="Siang"
                    {{ request('jadwal') == 'Siang' ? 'selected' : '' }}>
                    Siang
                </option>

                <option value="Malam"
                    {{ request('jadwal') == 'Malam' ? 'selected' : '' }}>
                    Malam
                </option>

            </select>

            <button type="submit"
                    class="bg-[#12384C] hover:bg-[#0D2C3C] text-white px-5 py-2 rounded-xl font-semibold transition">

                Filter

            </button>

            <a href="{{ route('menu-pasien.index') }}"
               class="border border-[#12384C] text-[#12384C] px-5 py-2 rounded-xl font-semibold hover:bg-[#12384C] hover:text-white transition">

                Reset

            </a>

        </form>

    </div>

<div class="w-full overflow-x-auto">
        <table class="min-w-full overflow-hidden rounded-2xl">

            <thead class="bg-[#12384C] text-white">

                <tr>
                    <th class="px-4 py-4 text-center">No</th>
                    <th class="px-4 py-4 text-left">Nama</th>
                    <th class="px-4 py-4 text-left">Menu Makanan</th>
                    <th class="px-4 py-4 text-center">Kalori</th>
                    <th class="px-4 py-4 text-center">Bentuk</th>
                    <th class="px-4 py-4 text-center">Jadwal</th>
                    <th class="px-4 py-4 text-center">Catatan</th>
                    <th class="px-4 py-4 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody class="bg-white">

                @forelse($menus as $item)

                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="px-4 py-4 text-center font-semibold">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-4 py-4 font-semibold uppercase">
                        {{ $item->patient->nama ?? '-' }}
                    </td>

                    <td class="px-4 py-4">
                        {{ $item->jenis_diet }}
                    </td>

                    <td class="px-4 py-4 text-center font-semibold">
                        {{ $item->kalori }}
                    </td>

                    <td class="px-4 py-4 text-center font-semibold">
                        {{ $item->bentuk_makanan }}
                    </td>

                    <td class="px-4 py-4 text-center font-semibold">
                        {{ $item->jadwal_makan }}
                    </td>

                    <td class="px-4 py-4 text-center text-blue-700 font-semibold">
                        {{ $item->catatan ?? '-' }}
                    </td>

                    <td class="px-4 py-4 text-center">

                        <div class="flex items-center justify-center gap-2">

                            <a href="{{ route('menu-pasien.edit', $item->id) }}"
                               class="bg-[#12384C] hover:bg-[#0D2C3C] text-white px-4 py-2 rounded-lg text-sm font-semibold transition">

                                Edit

                            </a>

                            <form action="{{ route('menu-pasien.destroy', $item->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="8"
                        class="text-center py-10 text-gray-500 font-medium">

                        Belum ada data menu pasien

                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

{{-- SWEET ALERT SUCCESS --}}
@if(session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Swal.fire({
        icon: 'success',
        title: 'Menu Berhasil Disimpan',
        text: '{{ session('success') }}',
        confirmButtonColor: '#1F516B',
        confirmButtonText: 'OK'
    });
</script>
@endif

<script>

function updatePatientCard() {

    let select = document.getElementById('patientSelect');

    let option = select.options[select.selectedIndex];

    document.getElementById('cardNama').innerText =
        option.getAttribute('data-nama');

    document.getElementById('cardNoRM').innerText =
        option.getAttribute('data-norm');

    document.getElementById('cardKamar').innerText =
        option.getAttribute('data-kamar');

    document.getElementById('cardBangsal').innerText =
        option.getAttribute('data-bangsal');

        document.getElementById('cardDiagnosis').innerText =
    option.getAttribute('data-diagnosis');

    document.getElementById('cardDiet').innerText =
    option.getAttribute('data-diet');

    document.getElementById('cardAlergi').innerText =
        option.getAttribute('data-alergi');
}

// AUTO LOAD PERTAMA
window.onload = updatePatientCard;

</script>

<script>

function updatePatientCard()
{
    const select = document.getElementById('patientSelect');

    const selected = select.options[select.selectedIndex];

    document.getElementById('cardNama').innerText =
        selected.dataset.nama || '-';

    document.getElementById('cardNoRM').innerText =
        selected.dataset.norm || '-';

    document.getElementById('cardKamar').innerText =
        selected.dataset.kamar || '-';

    document.getElementById('cardBangsal').innerText =
        selected.dataset.bangsal || '-';

    document.getElementById('cardDiagnosis').innerText =
        selected.dataset.diagnosis || '-';

    document.getElementById('cardDiet').innerText =
        selected.dataset.diet || '-';

    document.getElementById('cardAlergi').innerText =
        selected.dataset.alergi || '-';
}

</script>

@endsection