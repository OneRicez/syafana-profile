{{-- resources/views/components/navbar.blade.php --}}
@props(['currentRoute' => null])

<nav x-data="{ openSidebar: false, scrolled: false }" 
     x-cloak
     @scroll.window="scrolled = (window.pageYOffset > 0)"
     class="sticky top-0 z-50 transition-shadow duration-300 bg-[#006CB5] text-white uppercase"
     :class="{ 'shadow-lg': scrolled }"
>
    <div class="container mx-auto px-3 lg:xl:px-10 flex justify-between items-center font-bold ">
        {{-- Logo --}}
        <a href="/" class="text-xl">{{ $logo ?? '' }}</a>
        
        {{-- Navbar Links --}}
        <div class="hidden lg:flex space-x-8">
            <a href="{{ route('home') }}" 
                class="relative hover:text-gray-200 px-2 py-4">
                Home
                @if(Route::is('home'))
                    <span class="absolute bottom-0 left-0 right-0 h-1 bg-yellow-500 rounded"></span>
                @endif
            </a>

            <x-navbar.dropdown-item label="ABOUT" x-cloak>
                <x-navbar.dropdown-link href="#" label="Service 1" />
                <x-navbar.dropdown-link href="#" label="Service 2" />
                <x-navbar.dropdown-link href="#" label="Service 3" />
            </x-navbar.dropdown-item>

            <x-navbar.dropdown-item label="ACADEMIC" x-cloak>
                <x-navbar.dropdown-link href="#" label="Service 1" />
                <x-navbar.dropdown-link href="#" label="Service 2" />
                <x-navbar.dropdown-link href="#" label="Service 3" />
            </x-navbar.dropdown-item>

            <x-navbar.dropdown-item label="EXPLORE" x-cloak>
                <x-navbar.dropdown-link href="#" label="Service 1" />
                <x-navbar.dropdown-link href="#" label="Service 2" />
                <x-navbar.dropdown-link href="#" label="Service 3" />
            </x-navbar.dropdown-item>

            <x-navbar.dropdown-item label="DOWNLOAD" x-cloak>
                <x-navbar.dropdown-link href="#" label="Service 1" />
                <x-navbar.dropdown-link href="#" label="Service 2" />
                <x-navbar.dropdown-link href="#" label="Service 3" />
            </x-navbar.dropdown-item>
        </div>

        {{-- Enroll Now Button --}}
        <a href="#" class="bg-[#44AF69] px-8 py-4 hidden lg:flex">ENROLL NOW</a>

        {{-- Hamburger --}}
        <div class="lg:hidden justify-end flex py-2 px-2 ">
            <button @click="openSidebar = true">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        {{-- Mobile Sidebar --}}
        <div x-show="openSidebar" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="fixed inset-0 bg-black bg-opacity-50 z-50 lg:hidden">
            <div class="fixed top-0 right-0 w-64 bg-gray-800 h-full shadow-lg text-white">
                <div class="flex justify-between items-center px-4 py-4">
                    <a href="/" class="text-xl font-bold">{{ $title ?? 'SekolahKu' }}</a>
                    <button @click="openSidebar = false" class="text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="px-10 my-2">
                    {{ $mobileMenu ?? '' }}
                </div>
            </div>
        </div>
    </div>
</nav>