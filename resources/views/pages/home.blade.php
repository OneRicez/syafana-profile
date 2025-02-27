@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <x-carousel :slides="$carousel" />

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

  <div class="w-full h-full overflow-hidden relative px-10 my-5 bg-slate-400" >

    <x-video-player :videos="$videos" />
  </div>


<section class="container  mx-auto px-6 py-12 flex flex-col md:flex-row items-center"
    x-data="{
        images: @js($about_image),
        activeIndex: 0,
        next() {
            this.activeIndex = (this.activeIndex + 1) % this.images.length;
        },
        prev() {
            this.activeIndex = (this.activeIndex - 1 + this.images.length) % this.images.length;
        }
    }"
    x-init="
        console.log(images); // Debugging
        setInterval(() => next(), 5000);
    ">
    
    <!-- Carousel -->
    <div class="w-full md:w-1/2 relative">
        <div class="overflow-hidden rounded-lg shadow-lg w-full h-96">
            <template x-for="(image, index) in images" :key="index">
                <div x-show="index === activeIndex" class="relative w-full h-full">
                    <img :src="'/storage/' + image.img_path" class="w-full h-full object-content">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-80 text-white text-center p-2 text-sm">
                        <span x-text="image.alt"></span>
                    </div>
                </div>
            </template>
        </div>
        
        
        <button @click="prev" class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">&#10094;</button>
        <button @click="next" class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">&#10095;</button>
    </div>

    <div class="w-full md:w-1/2 md:pl-12 mt-6 md:mt-0">
        <h2 class="text-3xl font-bold mb-4">Tentang Kami</h2>
        <div class="[&>p]:text-gray-700 [&>p]:mt-4">
            {!! clean($about->content) !!}
        </div>
        <a href="{{route('about')}}" class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Read More</a>
    </div>
    
</section>


<x-news-layout :categories="$categories" :comments="$recent_comments">
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


    @slot('pagination')
        {{ $news->links('pagination::tailwind') }}
    @endslot
</x-news-layout>


<div class="container mx-auto px-4">
    <div class="relative">
      <!-- Container for sponsor logos -->
      <div class="overflow-x-auto scroll-smooth whitespace-nowrap" x-data="{ scrollLeft: 0 }">
        <div class="inline-flex space-x-6">
          <!-- Placeholder for sponsor logos -->
          @foreach ($sponsor as $item)
            <img src="{{ asset('storage/' . $item->img_path) }}" alt="{{ $item->alt }}" class="w-32 h-32 bg-gray-200 flex items-center justify-center" />
          @endforeach

        </div>
      </div>
    </div>
  </div>
  {{-- <div>ss</div> --}}
@endsection
