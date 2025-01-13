<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
        @font-face {
            font-family: 'Nirmala UI';
            src: url('{{ asset('fonts/nirmala.ttf') }}') format('truetype');
            font-weight: bold;
            font-style: normal;
        }
    </style>
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.3/dist/cdn.min.js" defer></script> --}}
</head>
<body class="antialiased" 
    x-data="{ pageLoaded: false }" 
    x-init="() => { pageLoaded = true }">
