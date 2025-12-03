<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Logo Icon --}}
    <link rel="icon" href="{{ asset('images/logo.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Wsywig --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    {{-- Wsywig End --}}
</head>

<body class="font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Fixed -->
        <div class="fixed left-0 top-0 h-full">
            @include('layouts.sidebar')
        </div>

        <!-- Container Konten (Navbar + Main) -->
        <div class="flex-1 flex flex-col ml-[250px]">
            <!-- Sesuaikan width sidebar: 250px -->

            <!-- Navbar Fixed -->
            <div class="fixed top-0 left-[350px] right-0 z-50">
                @include('layouts.navigation')
            </div>

            <!-- Main Content Scrollable -->
            <main class="mt-[70px] h-[calc(100vh-70px)] overflow-y-auto p-4">
                {{ $slot }}
            </main>
        </div>
    </div>


    {{-- Lucide Init --}}
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
    {{-- Lucide Init End --}}

    <script>
        function formatRupiah(input) {
            // Ambil angka saja
            let value = input.value.replace(/[^0-9]/g, "");

            if (!value) {
                input.value = "";
                return;
            }

            // Format angka jadi ribuan
            input.value = new Intl.NumberFormat("id-ID").format(value);
        }
    </script>

</body>

</html>
