<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
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
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Sans Pro';
            src: url('{{ asset('fonts/SourceSansPro.otf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Sans Pro Bold';
            src: url('{{ asset('fonts/SourceSansPro-Bold.otf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body class="antialiased" x-data="{ pageLoaded: false }" x-init="() => { pageLoaded = true }">
  <main x-cloak>
    @include('partials.top-header')
    <x-navbar/>
    @yield('content')
  </main>

  <!-- Footer container -->
  <x-footer/>
</body>
</html>

