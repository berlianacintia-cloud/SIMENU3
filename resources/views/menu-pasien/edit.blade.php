```php
@extends('layouts.app')
@section('title', 'Edit Menu Pasien')
@section('content')

<div class="w-full py-3 px-6">

    {{-- HEADER --}}
    <div class="mb-8">

        <p class="text-slate-600 mt-2">
            Perbarui data menu makanan pasien
        </p>

    </div>



    {{-- CARD --}}
    <div class="bg-[#EEF6F7] rounded-3xl shadow-md border border-slate-200 overflow-hidden">

        {{-- HEADER CARD --}}
        <div class="flex items-center gap-4 px-8 py-5 border-b border-slate-200 bg-white/30">

            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">
                <i class="fa-solid fa-utensils text-blue-600 text-xl"></i>
            </div>

            <div>

                <h2 class="text-2xl font-bold text-[#12384C]">
                    Informasi Menu Pasien
                </h2>

                <p class="text-sm text-slate-500">
                    Data menu dan kebutuhan makanan pasien
                </p>

            </div>

        </div>



        {{-- FORM --}}
        <form action="{{ route('menu-pasien.update', $menu->id) }}"
              method="POST"
              class="p-8">

            @csrf
            @method('PUT')



            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Pasien --}}
                <div class="md:col-span-2">

                    <label class="block font-semibold text-slate-700 mb-2">
                        Nama Pasien
                    </label>

                    <select name="patient_id"
                            class="w-full border border-slate-300 rounded-2xl px-4 py-3 bg-white">

                        @foreach($patients as $patient)

                        <option value="{{ $patient->id }}"
                            {{ $menu->patient_id == $patient->id ? 'selected' : '' }}>

                            {{ $patient->nama }}

                        </option>

                        @endforeach

                    </select>

                </div>



                {{-- Jenis Diet --}}
                <div>

                    <label class="block font-semibold text-slate-700 mb-2">
                        Menu Makanan
                    </label>

                    <input type="text"
                           name="jenis_diet"
                           value="{{ $menu->jenis_diet }}"
                           class="w-full border border-slate-300 rounded-2xl px-4 py-3 bg-white">

                </div>



                {{-- Kalori --}}
                <div>

                    <label class="block font-semibold text-slate-700 mb-2">
                        Kalori
                    </label>

                    <input type="text"
                           name="kalori"
                           value="{{ $menu->kalori }}"
                           class="w-full border border-slate-300 rounded-2xl px-4 py-3 bg-white">

                </div>



                {{-- Bentuk Makanan --}}
                <div>

                    <label class="block font-semibold text-slate-700 mb-2">
                        Bentuk Makanan
                    </label>

                    <select name="bentuk_makanan"
                            class="w-full border border-slate-300 rounded-2xl px-4 py-3 bg-white">

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



                {{-- Jadwal --}}
                <div>

                    <label class="block font-semibold text-slate-700 mb-2">
                        Jadwal Makan
                    </label>

                    <select name="jadwal_makan"
                            class="w-full border border-slate-300 rounded-2xl px-4 py-3 bg-white">

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



                {{-- Catatan --}}
                <div class="md:col-span-2">

                    <label class="block font-semibold text-slate-700 mb-2">
                        Catatan
                    </label>

                    <textarea name="catatan"
                              rows="4"
                              class="w-full border border-slate-300 rounded-2xl px-4 py-3 bg-white">{{ $menu->catatan }}</textarea>

                </div>

            </div>



            {{-- BUTTON --}}
            <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-slate-200">

                <a href="{{ route('menu-pasien.index') }}"
                   class="px-7 py-3 rounded-2xl bg-red-100 text-red-500 font-semibold hover:bg-red-200 transition">

                    <i class="fa-solid fa-xmark mr-2"></i>
                    Kembali

                </a>

                <button type="submit"
                        class="bg-[#12384C] hover:bg-[#0D2C3C]
                        text-white px-8 py-3 rounded-2xl font-semibold">

                    <i class="fa-solid fa-floppy-disk mr-2"></i>
                    Update Data

                </button>

            </div>

        </form>

    </div>

</div>

@endsection
```
