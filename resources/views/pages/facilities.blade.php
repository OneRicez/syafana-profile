@extends('layouts.app')
@section('title', 'Facilities')
@section('content')

<div class="text-5xl font-ssprobold px-10 text-[#091B8C] py-5 text-center">Facilities</div>

<div class="grid grid-cols-4 gap-2 w-4/5 mx-auto py-6">
    @foreach ($facilities as $facility)
    <div>
        <x-image-card 
            :imageUrl="$facility->img_path" 
            :title="$facility->title" 
            :description="$facility->description"
        />
    </div>
    @endforeach
    
    <!-- Add more image cards as needed -->
</div>

@endsection