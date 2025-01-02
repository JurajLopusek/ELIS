<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <!-- Styles -->

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @filamentStyles
    @livewireStyles
    {{--    @livewireScripts--}}

    <title>{{ $title ?? 'ELIS' }}</title>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="flex h-screen">
<!-- Navigation -->
<aside class="bg-gray-50 text-white w-64 p-4">
    @include("components.nav.nav")
</aside>

<!-- Main Content -->
<main class="flex-1 p-6 overflow-y-auto">
    {{ $slot }}
    @filamentScripts
    @vite('resources/js/app.js')
</main>
</body>
</html>
