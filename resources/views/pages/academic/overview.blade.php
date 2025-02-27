@extends('layouts.app')

@section('title', 'Academic - Syafana Islamic School')

@section('content')
<div  class="font-ssprobold px-10 text-[#091B8C] py-5 ">
  <span class="text-5xl">ACADEMIC</span>
  <div class="flex flex-col items-center lg:flex-row justify-around">
    <x-card-component 
      title="Kindergarten" 
      :description="$kindergarten_desc" 
      :image="$kindergarten_img" 
      href="academic.kindergarten" 
      buttonText="Read more"
    />
    <x-card-component 
      title="Primary" 
      :description="$primary_desc" 
      :image="$primary_img" 
      href="academic.primary" 
      buttonText="Read more"
    />
    <x-card-component 
      title="Secondary" 
      :description="$secondary_desc" 
      :image="$secondary_img" 
      href="academic.secondary" 
      buttonText="Read more"
    />

  </div>


</div>


@endsection