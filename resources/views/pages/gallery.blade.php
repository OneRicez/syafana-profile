@extends('layouts.app')
@section('title', 'Gallery - Syafana Islamic School')
@section('content')

<div class="text-5xl font-ssprobold px-10 text-[#091B8C] py-5 text-center">Gallery</div>

<div class="grid grid-cols-4 gap-2 w-4/5 mx-auto py-6">
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
  </div>
  <div>
      <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
  </div>
</div>

{{-- <div class="grid grid-cols-4 gap-2 w-4/5 mx-auto py-8">
  @foreach ($images as $image)
      <div>
          <img class="h-auto max-w-full rounded-lg" src="{{ $image->url }}" alt="{{ $image->alt_text }}">
      </div>
  @endforeach
</div> --}}

<!-- Pagination Links -->
{{-- <div class="grid grid-cols-4 gap-2 w-4/5 mx-auto py-8">
  @foreach ($images as $image)
      <div>
          <img class="h-auto max-w-full rounded-lg" src="{{ $image->url }}" alt="{{ $image->alt_text }}">
      </div>
  @endforeach
</div>
<div class="py-4">
    {{ $images->links() }}
</div> --}}


@endsection