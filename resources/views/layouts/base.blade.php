<!DOCTYPE html>
<html lang="{{ Formatting::getLang() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')
        <title>@yield('title')</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
</head>

<body x-data="{theme: $persist('dark'), scrollTo: ''}" x-bind:class='theme' class="flex flex-col min-h-screen bg-gray-100">
    <div>
        @yield('body')
    </div>
    @livewireScripts
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        function scrollToDiv(id) {
            const element = document.getElementById(id);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest' // or 'end' or 'center' or 'nearest'
                });
            }
        }
        window.addEventListener("popstate", function (event) { 
            window.location.reload(); 
        });
    </script>
    @stack('custom-scripts')
</body>

</html>
