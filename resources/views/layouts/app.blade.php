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

    {{-- Logo --}}
    <link rel="icon" href="{{ asset('images/logo.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar di kiri - Full height -->
        @include('layouts.sidebar')

        <!-- Container untuk Navbar dan Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar di atas (terpotong sidebar) -->
            @include('layouts.navigation')

            <!-- Main Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>


</body>
</html>
