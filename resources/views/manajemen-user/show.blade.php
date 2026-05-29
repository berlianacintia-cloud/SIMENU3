@extends('layouts.app')

@section('content')

<div class="w-full py-6 px-6">

    <div class="bg-[#EEF6F7] rounded-3xl shadow-sm border border-slate-200 overflow-hidden">

        {{-- HEADER --}}
        <div class="px-8 py-6 border-b border-slate-200 bg-white/40">

            <h1 class="text-3xl font-bold text-[#12384C]">
                Detail Pengguna
            </h1>

            <p class="text-slate-500 mt-2">
                Informasi lengkap pengguna sistem
            </p>

        </div>

        {{-- CONTENT --}}
        <div class="p-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="text-sm text-slate-500">
                        Nama Lengkap
                    </label>

                    <div class="mt-2 bg-white rounded-2xl px-5 py-4 border">
                        {{ $user->name }}
                    </div>
                </div>



                <div>
                    <label class="text-sm text-slate-500">
                        Email
                    </label>

                    <div class="mt-2 bg-white rounded-2xl px-5 py-4 border">
                        {{ $user->email }}
                    </div>
                </div>



                <div>
                    <label class="text-sm text-slate-500">
                        Role
                    </label>

                    <div class="mt-2 bg-white rounded-2xl px-5 py-4 border">
                        {{ $user->role }}
                    </div>
                </div>



                <div>
                    <label class="text-sm text-slate-500">
                        Dibuat Pada
                    </label>

                    <div class="mt-2 bg-white rounded-2xl px-5 py-4 border">
                        {{ $user->created_at->format('d M Y') }}
                    </div>
                </div>

            </div>



            <div class="mt-8">

                <a href="{{ route('manajemen-user.index') }}"
                   class="bg-[#12384C] text-white px-6 py-3 rounded-2xl font-semibold">

                    Kembali

                </a>

            </div>

        </div>

    </div>

</div>

@endsection
