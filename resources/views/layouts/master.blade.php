<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset("style/style.css") }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles 
</head>
<body class="{{ session('theme', 'light') }}">
    @livewire('header')
    @yield('content')
    @include('layouts.footer')
    @livewireScripts
    <script src="{{ asset('script/script.js') }}"></script>
</body>
</html>