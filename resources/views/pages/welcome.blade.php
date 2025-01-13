@extends('layouts.app')

@section('title', 'Home - Syafana Islamic School')

  @section('navbar')
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
            class="block px-3 py-4 border-b border-gray-200  last:border-b-0 rounded @if(Route::is('home')) @endif">
            Home
        </a>
        <a href="{{ route('about') }}" 
            class="block px-3 py-4 border-b border-gray-200  last:border-b-0 rounded @if(Route::is('home')) @endif">
            About
        </a>
        <a href="{{ route('home') }}" 
            class="block px-3 py-4 border-b border-gray-200  last:border-b-0 rounded @if(Route::is('home')) @endif">
            Academic
        </a>
        <a href="{{ route('home') }}" 
            class="block px-3 py-4 border-b border-gray-200  last:border-b-0 rounded @if(Route::is('home')) @endif">
            Explore
        </a>
        <a href="{{ route('home') }}" 
            class="block px-3 py-4 border-b border-gray-200  last:border-b-0 rounded @if(Route::is('home')) @endif">
            Download
        </a>
        {{-- Add more mobile menu items --}}
    </x-slot>
  </x-navbar>
  @endsection

  @section('content')
  <x-carousel :slides="[
        ['imgSrc' => 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp', 'imgAlt' => 'Vibrant abstract painting with swirling blue and light pink hues on a canvas.'],
        ['imgSrc' => 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp', 'imgAlt' => 'Vibrant abstract painting with swirling red, yellow, and pink hues on a canvas.'],
        ['imgSrc' => 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp', 'imgAlt' => 'Vibrant abstract painting with swirling blue and purple hues on a canvas.']
    ]" />


  <section>
    <div class="flex flex-wrap justify-center gap-6 my-10 px-10 py-4">
      <a href="#" class="bg-[#62D3C7] font-bold py-6 rounded-md text-center w-[150px] border-transparent border-2 hover:border-[#46AAA6] hover:shadow-xl hover:-translate-y-1 flex flex-col items-center">
        <span>MAGAZINE</span>
        <img src="{{ asset('icons/brochure.svg') }}" class="h-10 w-10 mt-2" alt="Magazine Icon" />
      </a>
      <a href="#" class="bg-[#62D3C7] font-bold py-6 rounded-md text-center w-[150px] border-transparent border-2 hover:border-[#46AAA6] hover:shadow-xl hover:-translate-y-1 flex flex-col items-center">
        <span>FACILITIES</span>
        <img src="{{ asset('icons/facilities.svg') }}" class="h-10 w-10 mt-2" alt="Facilities Icon" />
      </a>
      <a href="#" class="bg-[#62D3C7] font-bold py-6 rounded-md text-center w-[150px] border-transparent border-2 hover:border-[#46AAA6] hover:shadow-xl hover:-translate-y-1 flex flex-col items-center">
        <span>GALLERY</span>
        <img src="{{ asset('icons/gallery.svg') }}" class="h-10 w-10 mt-2" alt="Gallery Icon" />
      </a>
      <a href="#" class="bg-[#62D3C7] font-bold py-6 rounded-md text-center w-[150px] border-transparent border-2 hover:border-[#46AAA6] hover:shadow-xl hover:-translate-y-1 flex flex-col items-center">
        <span>ACADEMIC</span>
        <img src="{{ asset('icons/academic.svg') }}" class="h-10 w-10 mt-2" alt="Academic Icon" />
      </a>
    </div>
  </section>



  <div class="w-full h-[60vh] overflow-hidden relative px-10 my-5" >
    <iframe width="100%" height="100%" 
    src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=0&mute=1">
    </iframe> 
  </div>

  @php 
      $newsArticles = [
        ['title' => 'Test 1', 'author' => 'John Doe', 'image' => '#','date' => '01 13 2025', 'slug' => 'test-1'],
        ['title' => 'Test 2', 'author' => 'John Doe', 'image' => '#','date' => '01 13 2025', 'slug' => 'test-2'],
        ['title' => 'Test 2', 'author' => 'John Doe', 'image' => '#','date' => '01 13 2025', 'slug' => 'test-2'],
        ['title' => 'Test 2', 'author' => 'John Doe', 'image' => '#','date' => '01 13 2025', 'slug' => 'test-2'],
      ];
  @endphp
  <x-news-layout>
      @slot('newsGrid')
          @foreach($newsArticles as $article)
              <x-news-item 
                  :title="$article['title']"
                  :author="$article['author']"
                  :image="$article['image']"
                  :date="$article['date']"
                  :url="'/news/' . $article['slug']"
              />
          @endforeach
      @endslot
  
      @slot('categories')
          <ul class="space-y-2">
            @php
              $categories = ['cat', 'dog'];
            @endphp
              @foreach($categories as $category)
              <li>
                  <a href="#" class="text-gray-600 hover:text-blue-800 transition-colors duration-200">
                      {{ $category}}
                  </a>
              </li>
              @endforeach
          </ul>
      @endslot
  
      @slot('comments')
          @php  
          $recentComments = [['content' => "Ipsusm",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Lorem",'author' => 'John'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'DoASe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doe'],['content' => "Ipsum",'author' => 'Doer']];
          @endphp
          <x-comments :comments="$recentComments" />
      @endslot
  </x-news-layout>
@endsection
