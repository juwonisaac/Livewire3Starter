<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ mainTheme, darkMode: false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Livewire3Starter') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')
    <style>
        .toggle-switch {
            display: none !important;
        }
    </style>
</head>

<body :class="{ 'dark': darkMode }" class="font-sans  bg-gray-50 text-black antialiased">

    <div class="bg-blue-800 dark:bg-blue-950 text-gray-100 dark:text-white">
        <x-topHeader />
        <x-header />
    </div>

    <main class="min-h-screen" >
        @yield('content')
        @isset($slot)
            {{ $slot }}
        @endisset
    </main>
    <x-footer />
    @livewireScriptConfig 
    @stack('scripts')   
</body>

</html>
