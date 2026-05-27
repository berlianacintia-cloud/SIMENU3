@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white p-6 rounded-3xl shadow-md mt-10">

    <h1 class="text-3xl font-bold text-[#12384C] mb-6">
        Edit Menu Pasien
    </h1>

    <form action="{{ route('menu-pasien.update', $menu->id) }}"
          method="POST"
          class="space-y-5">

        @csrf
        @method('PUT')

        <!-- Nama Pasien -->
        <div>
            <label class="font-semibold">Nama Pasien</label>

            <select name="patient_id"
                    class="w-full border rounded-xl px-4 py-3 mt-2">

                @foreach($patients as $patient)

                <option value="{{ $patient->id }}"
                    {{ $menu->patient_id == $patient->id ? 'selected' : '' }}>

                    {{ $patient->nama }}

                </option>

                @endforeach

            </select>
        </div>

        <!-- Jenis Diet -->
        <div>
            <label class="font-semibold">Jenis Diet</label>

            <input type="text"
                   name="jenis_diet"
                   value="{{ $menu->jenis_diet }}"
                   class="w-full border rounded-xl px-4 py-3 mt-2">
        </div>

        <!-- Kalori -->
        <div>
            <label class="font-semibold">Kalori</label>

            <input type="text"
                   name="kalori"
                   value="{{ $menu->kalori }}"
                   class="w-full border rounded-xl px-4 py-3 mt-2">
        </div>

        <!-- Bentuk Makanan -->
        <div>
            <label class="font-semibold">Bentuk Makanan</label>

            <select name="bentuk_makanan"
                    class="w-full border rounded-xl px-4 py-3 mt-2">

                <option value="Biasa"
                    {{ $menu->bentuk_makanan == 'Biasa' ? 'selected' : '' }}>
                    Biasa
                </option>

                <option value="Lunak"
                    {{ $menu->bentuk_makanan == 'Lunak' ? 'selected' : '' }}>
                    Lunak
                </option>

                <option value="Saring"
                    {{ $menu->bentuk_makanan == 'Saring' ? 'selected' : '' }}>
                    Saring
                </option>

                <option value="Cair"
                    {{ $menu->bentuk_makanan == 'Cair' ? 'selected' : '' }}>
                    Cair
                </option>

            </select>
        </div>

        <!-- Jadwal Makan -->
        <div>
            <label class="font-semibold">Jadwal Makan</label>

            <select name="jadwal_makan"
                    class="w-full border rounded-xl px-4 py-3 mt-2">

                <option value="Pagi"
                    {{ $menu->jadwal_makan == 'Pagi' ? 'selected' : '' }}>
                    Pagi
                </option>

                <option value="Siang"
                    {{ $menu->jadwal_makan == 'Siang' ? 'selected' : '' }}>
                    Siang
                </option>

                <option value="Malam"
                    {{ $menu->jadwal_makan == 'Malam' ? 'selected' : '' }}>
                    Malam
                </option>

            </select>
        </div>

        <!-- Catatan -->
        <div>
            <label class="font-semibold">Catatan</label>

            <textarea name="catatan"
                      rows="4"
                      class="w-full border rounded-xl px-4 py-3 mt-2">{{ $menu->catatan }}</textarea>
        </div>

        <!-- Tombol -->
        <div class="flex gap-3">

            <button type="submit"
                    class="bg-[#12384C] hover:bg-[#0D2C3C] text-white px-6 py-3 rounded-xl font-semibold">

                Update Data

            </button>

            <a href="{{ route('menu-pasien.index') }}"
               class="border border-[#12384C] text-[#12384C] px-6 py-3 rounded-xl font-semibold hover:bg-[#12384C] hover:text-white transition">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection