<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIMENU</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    @include('layouts.sidebar')

    <div class="flex-1">

        <!-- NAVBAR -->
        @include('layouts.navbar')

        <!-- CONTENT -->
        <!-- CONTENT -->
<main class="px-4 py-1">

    @yield('content')

</main>

    </div>

</div>

</body>
</html>