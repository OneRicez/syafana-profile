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
        @font-face {
            font-family: 'Source Sans Pro';
            src: url('{{ asset('fonts/SourceSansPro.otf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'Source Sans Pro Bold';
            src: url('{{ asset('fonts/SourceSansPro-Bold.otf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
    </style>
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.3/dist/cdn.min.js" defer></script> --}}
</head>
<body class="antialiased" 
  x-data="{ pageLoaded: false }" 
  x-init="() => { pageLoaded = true }">

  <header>
    @include('partials.top-header') <!-- Include top header -->
    
  </header>
  @yield('navbar') <!-- Page-specific content -->

  <main x-cloak>
    @yield('content')
  </main>

  <!-- Footer container -->
  <footer
  class="text-center text-white text-surface/75 bg-[#006CB5] lg:text-left" x-cloak>
  <div
    class="flex items-center justify-center border-b-2 border-neutral-200 p-6  lg:justify-between">
    <div class="me-12 hidden lg:block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Social network icons container -->
    <div class="flex justify-center">
    </div>
  </div>

  <!-- Main container div: holds the entire content of the footer, including four sections (TW Elements, Products, Useful links, and Contact), with responsive styling and appropriate padding/margins. -->
  <div class="mx-1 lg:mx-10 py-10 text-left lg:text-center">
    <div class="grid lg:grid-cols-12/22/22/22/22 grid-cols-20/40/40 gap-x-2 lg:gap-x-6">
      <div class="flex flex-col font-bold text-base lg:text-xl py-4 pl-2">
        <a href="#" class="mb-2">Home</a>
        <a href="#" class="mb-2">Contact</a>
        <a href="#" class="mb-2">Enroll</a>
      </div>
      
      <!-- About section -->
      <div class="text-sm lg:text-base py-4">
        <h6 class="mb-3 font-semibold uppercase">About</h6>
        <p class="mb-1"><a href="#!">History</a></p>
        <p class="mb-1"><a href="#!">Vision & Mission</a></p>
        <p class="mb-1"><a href="#!">Welcome</a></p>
        <p><a href="#!">Organizational Structure</a></p>
      </div>
      <!-- Products section -->
      <div class="text-sm lg:text-base py-4">
        <h6 class="mb-3 font-semibold uppercase">Academic</h6>
        <p class="mb-1"><a href="#!">Kindergarten</a></p>
        <p class="mb-1"><a href="#!">Primary</a></p>
        <p class="mb-1"><a href="#!">Secondary</a></p>
        <p><a href="#!">Boarding School</a></p>
      </div>
      <!-- Useful links section -->
      <div class="text-sm lg:text-base py-4 grid grid-cols-subgrid lg:col-span-1 col-span-2">
        <div class="col-start-2">
          <h6 class="mb-3 font-semibold uppercase">Explore</h6>
          <p class="mb-1"><a href="#!">E-Learning</a></p>
          <p class="mb-1"><a href="#!">Teacher's Daily Health Monitoring</a></p>
          <p class="mb-1"><a href="#!">Special Program</a></p>
          <p class="mb-1"><a href="#!">Gallery</a></p>
          <p><a href="#!">Facilities</a></p>
        </div>
      </div>
      <!-- Extra section -->
      <div class="text-sm lg:text-base py-4">
        <h6 class="mb-3 font-semibold uppercase">Download</h6>
        <p class="mb-1"><a href="#!">File</a></p>
        <p class="mb-1"><a href="#!">S - Digest</a></p>
        <p class="mb-1"><a href="#!">Brochure</a></p>
      </div>
    </div>
  </div>


  <!--Copyright section-->
  <div class="bg-black/5 p-6 text-center">
    <span>© 2023 Copyright:</span>
    <a class="font-semibold" href="https://tw-elements.com/"
      ></a
    >
  </div>
  </footer>
</body>
</html>

