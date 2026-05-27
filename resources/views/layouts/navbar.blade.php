<nav class="bg-white border-b px-6 py-2 flex items-center justify-between">

    <!-- TITLE -->
    <div>

        <h1 class="text-3xl font-bold">
    @yield('title')
</h1>

    </div>

    <!-- RIGHT SECTION -->
    <div class="flex items-center gap-5">


<!-- USER INFO -->
<div class="flex items-center gap-4">

    <!-- USER CARD -->
    <div class="flex items-center gap-3 bg-[#F7FAFC] px-4 py-2 rounded-2xl shadow-sm border border-gray-100">

        <!-- ICON -->
        <div class="w-11 h-11 rounded-full bg-[#EAF2F5] flex items-center justify-center">

    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-5 h-5 text-[#1F516B]"
         fill="currentColor"
         viewBox="0 0 24 24">

        <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.315 0-10 1.672-10 5v3h20v-3c0-3.328-6.685-5-10-5z"/>

    </svg>

</div>

        <!-- USER -->
        <div class="leading-tight">

            <h2 class="font-semibold text-sm text-gray-800">

                {{ auth()->user()->name }}

            </h2>

            <p class="text-xs text-gray-500 mt-1">

                @if(auth()->user()->role == 'admin')
                    Administrator

                @elseif(auth()->user()->role == 'dokter')
                    Dokter

                @elseif(auth()->user()->role == 'ahli_gizi')
                    Ahli Gizi

                @elseif(auth()->user()->role == 'petugas_dapur')
                    Petugas Dapur

                @endif

            </p>

        </div>

    </div>


        <!-- LOGOUT -->
        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl font-medium transition">

                Logout

            </button>

        </form>
        

    </div>

</nav>