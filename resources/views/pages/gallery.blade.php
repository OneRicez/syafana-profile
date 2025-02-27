@extends('layouts.app')
@section('title', 'Gallery')
@section('content')

<div class="text-5xl font-ssprobold px-10 text-[#091B8C] py-5 text-center">Gallery</div>

<div class="grid grid-cols-4 gap-2 w-4/5 mx-auto py-6">
    <div>
        <x-image-card 
            imageUrl="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" 
            title="Image 1" 
            description="This is the first image description."
        />
    </div>
    <div>
        <x-image-card 
            imageUrl="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" 
            title="Image 2" 
            description="This is the second image description."
        />
    </div>

</div>
{{-- @foreach ($posts as $post)
<div>
    <x-image-card 
        :imageUrl="$post->img_path" 
        :title="$post->title" 
        :description="$post->description"
    />
</div>
@endforeach --}}




@endsection