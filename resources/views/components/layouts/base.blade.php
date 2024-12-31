<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Styles -->

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @livewireStyles
{{--    @livewireScripts--}}

    <title>{{ $title ?? 'eRobots' }}</title>
</head>
<body>

<div class="">
    @include("components.nav.nav")
</div>
{{--@include('cookie-consent::index')--}}

<div class="relative">

    {{ $slot }}
</div>

{{--@include('components.includes.footer')--}}

</body>


</html>
