@extends('layouts.app')

@section('content')

<div class="w-full py-6 px-6">

    <div class="bg-[#EEF6F7] rounded-3xl shadow-sm border border-slate-200 overflow-hidden">

        {{-- HEADER --}}
        <div class="px-8 py-6 border-b border-slate-200 bg-white/40">

            <h1 class="text-3xl font-bold text-[#12384C]">
                Edit Pengguna
            </h1>

            <p class="text-slate-500 mt-2">
                Perbarui informasi pengguna sistem
            </p>

        </div>



        {{-- FORM --}}
        <form action="{{ route('users.update', $user->id) }}"
              method="POST"
              class="p-8">

            @csrf
            @method('PUT')



            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- NAMA --}}
                <div>

                    <label class="font-semibold text-slate-700 block mb-2">
                        Nama
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ $user->name }}"
                           class="w-full border rounded-2xl px-4 py-3 bg-white">

                </div>



                {{-- EMAIL --}}
                <div>

                    <label class="font-semibold text-slate-700 block mb-2">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ $user->email }}"
                           class="w-full border rounded-2xl px-4 py-3 bg-white">

                </div>



                {{-- ROLE --}}
                <div class="md:col-span-2">

                    <label class="font-semibold text-slate-700 block mb-2">
                        Role
                    </label>

                    <select name="role"
                            class="w-full border rounded-2xl px-4 py-3 bg-white">

                        <option value="admin"
                            {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="dokter"
                            {{ $user->role == 'dokter' ? 'selected' : '' }}>
                            Dokter
                        </option>

                        <option value="ahli_gizi"
                            {{ $user->role == 'ahli_gizi' ? 'selected' : '' }}>
                            Ahli Gizi
                        </option>

                    </select>

                </div>

            </div>



            <div class="flex justify-end gap-4 mt-8">

                <a href="{{ route('manajemen-user.index') }}"
                   class="bg-red-100 text-red-500 px-6 py-3 rounded-2xl font-semibold">

                    Batal

                </a>

                <button type="submit"
                        class="bg-[#12384C] text-white px-6 py-3 rounded-2xl font-semibold">

                    Update User

                </button>

            </div>

        </form>

    </div>

</div>

@endsection
