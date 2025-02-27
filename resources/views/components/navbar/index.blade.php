{{-- resources/views/components/navbar.blade.php --}}
<nav x-data="{ openSidebar: false, scrolled: false, mobileDropdowns: {} }" 
     x-cloak
     @scroll.window="scrolled = (window.pageYOffset > 0)"
     class="sticky w-100 top-0 z-50 transition-shadow duration-300 bg-[#006CB5] text-white"
     :class="{'bg-[#006CB5]/95 shadow-lg': scrolled }"
>
    <div class="container mx-auto px-3 lg:xl:px-10 flex justify-between items-center font-bold">
        {{-- Logo --}}
        <div x-show="scrolled" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-90"
             x-transition:enter-end="opacity-100 transform scale-100"
             class="flex items-center space-x-2">
            <img src="{{asset('storage/'.$headerData['logo'])}}" alt="Logo" class="h-8 w-auto">
            {{-- <span class="text-lg font-semibold">Syafana</span> --}}
        </div>
        
        {{-- Navbar Links - Desktop with Hover --}}
        <div class="hidden lg:flex space-x-8">
            <div class="relative group">
                <div class="px-2 py-4 hover:text-gray-200">
                    <a href="{{ route('home') }}" >
                        Home
                    </a>
                </div>
                <span class="absolute bottom-0 left-0 right-0 h-1 bg-yellow-500 rounded transform scale-x-0 transition-transform duration-200 ease-out group-hover:scale-x-100"></span>
                @if (Route::is('home'))
                    <span class="absolute bottom-0 left-0 right-0 h-1 bg-yellow-500 rounded"></span>
                @endif
            </div>

            <div class="relative group"> 
                <div class="px-2 py-4 hover:text-gray-200">
                    <a href="{{ route('about') }}" >
                        About
                    </a>
                </div>
                @if (Route::is('about'))
                    <span class="absolute bottom-0 left-0 right-0 h-1 bg-yellow-500 rounded"></span>
                @endif
                <span class="absolute bottom-0 left-0 right-0 h-1 bg-yellow-500 rounded transform scale-x-0 transition-transform duration-200 ease-out group-hover:scale-x-100"></span>
                <div class="absolute left-0 hidden group-hover:block pt-2">
                    <div class="bg-white rounded-md shadow-lg py-2 w-48">
                        
                        <a href="{{route('about')}}#history" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">History</a>
                        <a href="{{route('about')}}#vision_mission" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Vision & Mission</a>
                        <a href="{{route('about')}}#welcome" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Welcome</a>
                        <a href="{{route('about')}}#orgstructure" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Organizational Structure</a>
                    </div>
                </div>
            </div>
            <div class="relative group">
                <div class="px-2 py-4 hover:text-gray-200">
                    <a href="{{route('academic')}}" >
                        Academic
                    </a>
                </div>
                @if (Route::is('academic'))
                    <span class="absolute bottom-0 left-0 right-0 h-1 bg-yellow-500 rounded"></span>
                @endif
                <span class="absolute bottom-0 left-0 right-0 h-1 bg-yellow-500 rounded transform scale-x-0 transition-transform duration-200 ease-out group-hover:scale-x-100"></span>
                <div class="absolute left-0 hidden group-hover:block pt-2">
                    <div class="bg-white rounded-md shadow-lg py-2 w-48">
                        <a href="{{route('academic.kindergarten')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Kindergarten</a>
                        <a href="{{route('academic.primary')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Primary</a>
                        <a href="{{route('academic.secondary')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Secondary</a>
                        <a href="{{route('academic.boarding')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Boarding School</a>
                    </div>
                </div>
            </div>
            <div class="relative group">
                <div class="px-2 py-4 hover:text-gray-200 cursor-default">
                    Explore
                </div>
                <span class="absolute bottom-0 left-0 right-0 h-1 bg-yellow-500 rounded transform scale-x-0 transition-transform duration-200 ease-out group-hover:scale-x-100"></span>
                <div class="absolute left-0 hidden group-hover:block pt-2">
                    <div class="bg-white rounded-md shadow-lg py-2 w-48">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">E-Learning</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">E-Library</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Special Program</a>
                        <a href="{{route('gallery')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Gallery</a>
                        <a href="{{route('facility')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Facilities</a>
                    </div>
                </div>
            </div>
            <div class="relative group">
                <button class="px-2 py-4 hover:text-gray-200">
                    Download
                </button>
                <span class="absolute bottom-0 left-0 right-0 h-1 bg-yellow-500 rounded transform scale-x-0 transition-transform duration-200 ease-out group-hover:scale-x-100"></span>
                <div class="absolute left-0 hidden group-hover:block pt-2">
                    <div class="bg-white rounded-md shadow-lg py-2 w-48">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">File</a>
                        {{-- <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">S-Digest</a> --}}
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Brochure</a>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="scrolled" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-90"
             x-transition:enter-end="opacity-100 transform scale-100"
             class="hidden md:flex items-center space-x-4 text-sm">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('icons/telephone.svg') }}" class="h-5 w-5">
                <a href={{route('contact-us')}} class="hover:text-yellow-500">Contact Us</a>
            </div>
            <div class="flex items-center space-x-2">
                <img src="{{ asset('icons/mail.svg') }}" class="h-5 w-5">
                <span>info@syafana.sch.id</span>
            </div>
        </div>

        {{-- Enroll Now Button --}}
        <a href="#" class="bg-[#44AF69] px-8 py-4 hidden lg:flex" :class="{'bg-[#44AF69]/95 shadow-lg': scrolled }">ENROLL NOW</a>

        {{-- Hamburger --}}
        <div class="lg:hidden justify-end flex py-2 px-2">
            <button @click="openSidebar = true">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        {{-- Mobile Sidebar with Clickable Dropdowns --}}
        <div x-show="openSidebar" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="fixed inset-0 bg-black bg-opacity-50 z-50 lg:hidden"
            @click.self="openSidebar = false"
        >
            <div class="fixed top-0 right-0 w-64 bg-white h-full shadow-lg text-black overflow-y-auto">
                <div class="flex justify-between items-center px-4 py-4 border-b">
                    <a href="/" class="text-xl font-bold">{{ $title ?? 'Syafana' }}</a>
                    <button @click="openSidebar = false" class="text-gray-600 hover:text-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="px-4 py-2">
                    {{-- Mobile Menu Items --}}
                    <a href="{{ route('home') }}" class="block py-2 hover:text-blue-600">Home</a>
                    
                    <div x-data="{ open: false }">
                        <button 
                            @click="open = !open" 
                            class="flex items-center justify-between w-full py-2 hover:text-blue-600"
                        >
                            <span>About</span>
                            <svg 
                                class="w-4 h-4 transition-transform"
                                :class="{'rotate-180': open}"
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        {{-- Mobile Dropdown Content --}}
                        <div 
                            x-show="open"
                            x-collapse
                            class="pl-4"
                        >
                            <a href="{{route('about')}}#history" class="block py-2 hover:text-blue-600">History</a>
                            <a href="{{route('about')}}#vision_mission" class="block py-2 hover:text-blue-600">Vision & Mission</a>
                            <a href="{{route('about')}}#welcome" class="block py-2 hover:text-blue-600">Welcome</a>
                            <a href="{{route('about')}}#orgstruc" class="block py-2 hover:text-blue-600">Organizational Structure</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }">
                        <button 
                            @click="open = !open" 
                            class="flex items-center justify-between w-full py-2 hover:text-blue-600"
                        >
                            <span>Academic</span>
                            <svg 
                                class="w-4 h-4 transition-transform"
                                :class="{'rotate-180': open}"
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        {{-- Mobile Dropdown Content --}}
                        <div 
                            x-show="open"
                            x-collapse
                            class="pl-4"
                        >
                            <a href="{{route('academic.kindergarten')}}" class="block py-2 hover:text-blue-600">Kindergarten</a>
                            <a href="{{route('academic.primary')}}" class="block py-2 hover:text-blue-600">Primary</a>
                            <a href="{{route('academic.secondary')}}" class="block py-2 hover:text-blue-600">Secondary</a>
                            <a href="{{route('academic.boarding')}}" class="block py-2 hover:text-blue-600">Boarding School</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }">
                        <button 
                            @click="open = !open" 
                            class="flex items-center justify-between w-full py-2 hover:text-blue-600"
                        >
                            <span>Explore</span>
                            <svg 
                                class="w-4 h-4 transition-transform"
                                :class="{'rotate-180': open}"
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        {{-- Mobile Dropdown Content --}}
                        <div 
                            x-show="open"
                            x-collapse
                            class="pl-4"
                        >
                            <a href="#" class="block py-2 hover:text-blue-600">E-Learning</a>
                            <a href="#" class="block py-2 hover:text-blue-600">E-Library</a>
                            <a href="#" class="block py-2 hover:text-blue-600">Special Program</a>
                            <a href="#" class="block py-2 hover:text-blue-600">Gallery</a>
                            <a href="#" class="block py-2 hover:text-blue-600">Facilities</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }">
                        <button 
                            @click="open = !open" 
                            class="flex items-center justify-between w-full py-2 hover:text-blue-600"
                        >
                            <span>Download</span>
                            <svg 
                                class="w-4 h-4 transition-transform"
                                :class="{'rotate-180': open}"
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        {{-- Mobile Dropdown Content --}}
                        <div 
                            x-show="open"
                            x-collapse
                            class="pl-4"
                        >
                            <a href="#" class="block py-2 hover:text-blue-600">File</a>
                            {{-- <a href="#" class="block py-2 hover:text-blue-600">S-Digest</a> --}}
                            <a href="#" class="block py-2 hover:text-blue-600">Brochure</a>
                        </div>
                    </div>

                    {{-- Mobile Enroll Button --}}
                    <div class="mt-4">
                        <a href="#" class="block text-center bg-[#44AF69] text-white py-2 px-4 rounded">
                            ENROLL NOW
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>