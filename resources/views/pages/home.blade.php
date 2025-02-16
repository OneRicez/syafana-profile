@extends('layouts.app')

@section('title', 'Home - Syafana Islamic School')

  {{-- @section('navbar')
  <!-- Navbar --> 
  <x-navbar x-cloak > 
    <x-slot:logo>
        Your logo here
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
        Add more mobile menu items
    </x-slot>
  </x-navbar>
  @endsection --}}

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
      <a href="{{route('gallery')}}" class="bg-[#62D3C7] font-bold py-6 rounded-md text-center w-[150px] border-transparent border-2 hover:border-[#46AAA6] hover:shadow-xl hover:-translate-y-1 flex flex-col items-center">
        <span>GALLERY</span>
        <img src="{{ asset('icons/gallery.svg') }}" class="h-10 w-10 mt-2" alt="Gallery Icon" />
      </a>
      <a href="{{route('academic')}}" class="bg-[#62D3C7] font-bold py-6 rounded-md text-center w-[150px] border-transparent border-2 hover:border-[#46AAA6] hover:shadow-xl hover:-translate-y-1 flex flex-col items-center">
        <span>ACADEMIC</span>
        <img src="{{ asset('icons/academic.svg') }}" class="h-10 w-10 mt-2" alt="Academic Icon" />
      </a>
    </div>
  </section>



  <div class="w-full h-[60vh] overflow-hidden relative px-10 my-5" >
    <iframe width="100%" height="100%" 
    src="">
    </iframe> 
  </div>

  <section class="container mx-auto px-6 py-12 flex flex-col md:flex-row items-center" x-data="{
        images: [
            { url: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp', title: 'Visi Perusahaan' },
            { url: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp', title: 'Misi Kami' },
            { url: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp', title: 'Tim Profesional' }
        ],
        activeIndex: 0,
        next() {
            this.activeIndex = (this.activeIndex + 1) % this.images.length;
        },
        prev() {
            this.activeIndex = (this.activeIndex - 1 + this.images.length) % this.images.length;
        }
    }" x-init="setInterval(() => next(), 5000)">
    
    <!-- Carousel -->
    <div class="w-full md:w-1/2 relative">
        <div class="overflow-hidden rounded-lg shadow-lg">
            <template x-for="(image, index) in images" :key="index">
                <div x-show="index === activeIndex" class="relative">
                    <img :src="image.url" class="w-full h-auto">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center p-2 text-sm">
                        <span x-text="image.title"></span>
                    </div>
                </div>
            </template>
        </div>
        <button @click="prev" class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">&#10094;</button>
        <button @click="next" class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">&#10095;</button>
      </div>
      
      <!-- About Us Description -->
      <div class="w-full md:w-1/2 md:pl-12 mt-6 md:mt-0">
        <h2 class="text-3xl font-bold mb-4">Tentang Kami</h2>
        <p class="text-gray-700">Kami adalah perusahaan yang berkomitmen untuk memberikan layanan terbaik kepada pelanggan kami. Dengan visi yang kuat dan tim profesional, kami terus berkembang untuk menciptakan inovasi yang berdampak positif.</p>
        <p class="mt-4 text-gray-700">Misi kami adalah memberikan solusi terbaik dan membangun hubungan jangka panjang dengan pelanggan kami.</p>
        <a href="{{route('about')}}" class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Read More</a>
    </div>
</section>

<x-news-layout>
    @slot('newsGrid')
        @foreach($news as $article)
            <x-news-item 
                :title="$article->title"
                :author="$article->author"
                :image="$article->image"
                :date="$article->updated_at->format('d M Y')"
                :url="'/news/' . $article['slug']"
            />
        @endforeach
    @endslot

    @slot('categories')
        <ul class="space-y-2">
            {{-- Categories --}}
        </ul>
    @endslot

    @slot('comments')
        {{-- Comments --}}
    @endslot

    @slot('pagination')
        {{ $news->links('pagination::tailwind') }}
    @endslot
</x-news-layout>



  {{-- <div>ss</div> --}}
@endsection
