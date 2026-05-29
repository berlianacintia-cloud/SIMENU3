<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>SIMENU Login</title>

</head>

<body class="bg-[#F5F5F5] overflow-hidden">

<div class="min-h-screen flex">

    <!-- LEFT LOGIN -->
    <div class="w-1/2 flex items-center justify-center px-16">

        <div class="w-full max-w-md">

            <h1 class="text-5xl font-bold text-[#1F516B] mb-12">
                LOGIN
            </h1>

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <!-- ROLE -->
                <div class="mb-6">

                    <label class="block text-lg font-semibold mb-2 text-[#1F516B]">
                        Login Sebagai
                    </label>

                    <select name="role"
                            class="w-full border border-gray-300 rounded-xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#1F516B]">

                        <option value="">-- Pilih Role --</option>

                        <option value="admin">Admin</option>
                        <option value="dokter">Dokter</option>
                        <option value="ahli_gizi">Ahli Gizi</option>
                        <option value="petugas_dapur">Petugas Dapur</option>

                    </select>

                </div>

                <!-- USERNAME -->
                <div class="mb-6">

                    <label class="block text-lg font-semibold mb-2 text-[#1F516B]">
                        Email
                    </label>

                    <input type="text"
                           name="email"
                           placeholder="Masukkan email"
                           class="w-full border border-gray-300 rounded-xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#1F516B]"
                           required>

                </div>

                <!-- PASSWORD -->
                <div class="mb-4">

                    <label class="block text-lg font-semibold mb-2 text-[#1F516B]">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           placeholder="Masukkan password"
                           class="w-full border border-gray-300 rounded-xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#1F516B]"
                           required>

                </div>

                <div class="text-right mb-8">

                    <a href="#"
                       class="text-[#1F516B] text-sm hover:underline">

                        Forgot your password?

                    </a>

                </div>

                <!-- BUTTON -->
                <button type="submit"
                        class="w-full bg-[#1F516B] hover:bg-[#163C50] text-white py-4 rounded-xl text-xl font-semibold transition duration-300 shadow-lg">

                    Login

                </button>

            </form>

        </div>

    </div>

    <!-- RIGHT -->
    <div class="w-1/2 bg-[#1F516B] rounded-l-[120px] flex items-center justify-center">

        <div class="text-white px-16">

            <h1 class="text-7xl font-light leading-tight">

                Welcome to
                <span class="font-bold">
                    SIMENU
                </span>

            </h1>

            <p class="mt-4 text-3xl italic font-light">

                Manage inpatient meal plans and patient dietary needs efficiently

            </p>

        </div>

    </div>

</div>

</body>
</html>