@extends('header')

<div x-show="pageLoaded">
<section class="bg-white shadow-sm" x-cloak>
  <div class="container mx-auto px-0 py-1 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
    <!-- Logo Section -->
    <div class="flex justify-center md:justify-start items-center space-x-0">
      {{-- <img src="your-logo.png" alt="Syafana Islamic School" class="h-12"> --}}
      {{-- Uncomment if needed --}}
      <!-- <h1 class="text-blue-800 font-bold text-lg">Syafana Islamic School</h1> -->
    </div>

    <!-- Contact Info Section -->
    <div class="flex px-10 flex-col md:flex-row items-center text-center md:text-left space-y-4 md:space-y-0 md:space-x-10">
      <!-- Phone -->
      <div class="flex items-center space-x-2">
        <img src="{{ asset('icons/telephone.svg') }}" alt="Telephone Icon" class="h-6 w-6 m-2">
        <div>
          <p class="text-xs text-gray-600">Contact Number</p>
          <p class="font-semibold text-xs">+62 819-3043-7474</p>
          <p class="font-semibold text-xs">+62 819-3043-7479</p>
        </div>
      </div>

      <!-- Work Hours -->
      <div class="flex items-center space-x-2">
        <img src="{{ asset('icons/clock.svg') }}" alt="Clock Icon" class="h-6 w-6 m-2">
        <div>
          <p class="text-xs text-gray-600">Work Hours</p>
          <p class="font-semibold text-xs">07:00 - 16:00 WIB</p>
        </div>
      </div>

      <!-- Email -->
      <div class="flex items-center space-x-2">
        <img src="{{ asset('icons/mail.svg') }}" alt="Mail Icon" class="h-6 w-6 m-2">
        <div>
          <p class="text-xs text-gray-600">Email</p>
          <p class="font-semibold text-xs">info@syafana.sch.id</p>
        </div>
      </div>
    </div>

    <!-- Button and Social Media Section -->
    <div class="flex ml-4 flex-col shrink-0 md:flex-row items-center space-y-2 md:space-y-1 md:space-x-4">
      <!-- Contact Us Button -->
      <a href="mailto:info@syafana.sch.id" class="px-10 py-2 bg-[#80ADA0] text-white text-lg font-medium rounded-md hover:bg-[#739c90] transition">
        Contact Us
      </a>

      <!-- Social Media Icons -->
      <div class="flex justify-center space-x-1 ">
        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
          <img src="{{ asset('icons/facebook-c.svg') }}" alt="Facebook" class="h-8 w-8 ">
        </a>
        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer">
          <img src="{{ asset('icons/youtube-c.svg') }}" alt="YouTube" class="h-8 w-8">
        </a>
        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
          <img src="{{ asset('icons/instagram-c.svg') }}" alt="Instagram" class="h-8 w-8">
        </a>
      </div>
    </div>

  </div>
</section>
{{-- END TOP HEADER --}}

<!-- Navbar --> 

  <x-navbar x-cloak >
    <x-slot:logo>
        {{-- Your logo here --}}
    </x-slot>
    
    <x-slot:title>
        SekolahKu
    </x-slot>
    
    <x-slot:mobileMenu>
        <a href="{{ route('home') }}" 
           class="block py-2 hover:bg-gray-700 rounded @if(Route::is('home')) bg-yellow-500 @endif">
            Home
        </a>
        <a href="{{ route('home') }}" 
           class="block py-2 my-2 hover:bg-gray-700 rounded @if(Route::is('home')) bg-yellow-500 @endif">
            Home
        </a>
        {{-- Add more mobile menu items --}}
    </x-slot>
  </x-navbar>

  <section>
    <div x-data="{            
      slides: [                
          {
              imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp',
              imgAlt: 'Vibrant abstract painting with swirling blue and light pink hues on a canvas.',                
          },                
          {                    
              imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',                    
              imgAlt: 'Vibrant abstract painting with swirling red, yellow, and pink hues on a canvas.',                
          },                
          {                    
              imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',                    
              imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',                
          },            
      ],            
      currentSlideIndex: 1,
      debug(){
        console.log(this.slides);
      },
      previous() {                
          if (this.currentSlideIndex > 1) {                    
              this.currentSlideIndex = this.currentSlideIndex - 1                
          } else {   
              // If it's the first slide, go to the last slide           
              this.currentSlideIndex = this.slides.length                
          }            
      },            
      next() {                
          if (this.currentSlideIndex < this.slides.length) {                    
              this.currentSlideIndex = this.currentSlideIndex + 1                
          } else {                 
              // If it's the last slide, go to the first slide    
              this.currentSlideIndex = 1                
          }            
      },        
    }" class="relative w-full overflow-hidden">
    
      <!-- previous button -->
      <button type="button" class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 " aria-label="previous slide" x-on:click="previous()">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
          </svg>
      </button>
    
      <!-- next button -->
      <button type="button" class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 " aria-label="next slide" x-on:click="next()">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
      </button>
     
      <!-- slides -->
      <!-- Change min-h-[50svh] to your preferred height size -->
      <div class="relative min-h-[50svh] w-full">
          <template x-for="(slide, index) in slides">
              <div x-show="currentSlideIndex == index + 1" class="absolute inset-0" x-transition.opacity.duration.1000ms>
                  <img class="absolute w-full h-full inset-0 object-cover text-neutral-600 " x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt" />
              </div>
          </template>
      </div>
      
      <!-- indicators -->
      <div class="absolute rounded-md bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 bg-white/75 px-1.5 py-1 md:px-2 " role="group" aria-label="slides" >
          <template x-for="(slide, index) in slides">
              <button class="size-2 cursor-pointer rounded-full transition bg-neutral-600 " x-on:click="currentSlideIndex = index + 1" x-bind:class="[currentSlideIndex === index + 1 ? 'bg-neutral-600' : 'bg-neutral-600/50 ']" x-bind:aria-label="'slide ' + (index + 1)"></button>
          </template>
      </div>
    </div>
  </section>

  <section>
    <div class="flex flex-wrap justify-center gap-6 my-10 px-10 py-4">
      <a href="#" class="bg-[#62D3C7] font-bold py-6 rounded-md text-center w-[150px] border-transparent border-2 hover:border-[#46AAA6]">MAGAZINE ></a>
      <a href="#" class="bg-[#62D3C7] font-bold py-6 rounded-md text-center w-[150px] border-transparent border-2 hover:border-[#46AAA6]">FACILITIES ></a>
      <a href="#" class="bg-[#62D3C7] font-bold py-6 rounded-md text-center w-[150px] border-transparent border-2 hover:border-[#46AAA6]">GALLERY ></a>
      <a href="#" class="bg-[#62D3C7] font-bold py-6 rounded-md text-center w-[150px] border-transparent border-2 hover:border-[#46AAA6]">ACADEMIC ></a>
    </div>
  </section>
  
  <span class="font-weight-w1">More About us</span>
  <div class="w-auto overflow-hidden relative px-10">
    <iframe width="100%" height="100%" 
    src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=0&mute=1">
    </iframe> 
  </div>

  
  




</div>
@extends('footer')
