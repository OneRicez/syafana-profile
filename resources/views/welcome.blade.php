@extends('header')

<header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
      <!-- Logo -->
      <div class="flex items-center space-x-2">
        <img src="your-logo.png" alt="Syafana Islamic School" class="h-12">
        <h1 class="text-blue-800 font-bold text-lg">Syafana Islamic School</h1>
      </div>
  
      <!-- Contact Info -->
      <div class="hidden md:flex items-center space-x-6">
        <div class="flex items-center space-x-1">
            <img src="{{asset('icons/telephone.svg')}}"alt="telephone" class="h-8 w-8 p-2">
            <div>
                <p class="text-sm text-gray-600">Contact Us</p>
                <p class="font-semibold text-sm">+62 819-3043-7474</p>
                <p class="font-semibold text-sm">+62 819-3043-7479</p>
            </div>
        </div>
  
        <div class="flex items-center space-x-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 10-8 0v4m-2 0a6 6 0 0112 0v4a2 2 0 002 2H4a2 2 0 002-2v-4" />
          </svg>
          <p class="text-sm font-semibold">07:00 - 16:00 WIB</p>
        </div>
  
        <div class="flex items-center space-x-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89-2.63a2 2 0 011.84 0L21 8m0 0a2 2 0 010 3.74l-7.89 2.63a2 2 0 01-1.84 0L3 11.74a2 2 0 010-3.74m18 0V19a2 2 0 01-2 2H5a2 2 0 01-2-2V8m0 11l7.89-2.63a2 2 0 011.84 0L21 19" />
          </svg>
          <p class="text-sm font-semibold">info@syafana.sch.id</p>
        </div>
      </div>
  
      <!-- Call to Action -->
      <div class="flex items-center space-x-4">
        <a href="#" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-300">Contact Us</a>
        <div class="flex space-x-2 text-gray-500">
          <a href="#" class="hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12.07A10 10 0 0012 2v20a10 10 0 0010-9.93z" /><path d="M2 12.07A10 10 0 0012 22V2A10 10 0 002 12.07z" /></svg>
          </a>
          <a href="#" class="hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M22 4.54A10 10 0 002.05 4.53a10 10 0 0019.9 0z" /><path d="M2 12.07A10 10 0 0012 22V2A10 10 0 002 12.07z" /></svg>
          </a>
        </div>
        <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-green-600">Enroll Now</a>
      </div>
    </div>
  
    <!-- Navigation -->
    <nav class="bg-blue-700">
      <div class="container mx-auto px-4">
        <ul class="flex space-x-4 text-white text-sm font-semibold py-3">
          <li><a href="#" class="hover:underline">Home</a></li>
          <li><a href="#" class="hover:underline">About Us</a></li>
          <li><a href="#" class="hover:underline">Academic</a></li>
          <li><a href="#" class="hover:underline">Explore</a></li>
          <li><a href="#" class="hover:underline">Download</a></li>
        </ul>
      </div>
    </nav>
  </header>
  

@extends('footer')
        
