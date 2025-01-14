@extends('layouts.app')

@section('title', 'Academic - Syafana Islamic School')

@section('content')
<div  class="font-ssprobold px-10 text-[#091B8C] py-5 ">
  <span class="text-5xl">ACADEMIC</span>

  <div class="flex flex-col items-center lg:flex-row justify-around">
    <x-card-component 
      title="Kindergarten" 
      description="The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to 'Naviglio' where you can enjoy the main night life in Barcelona." 
      image="https://images.unsplash.com/photo-1540553016722-983e48a2cd10?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" 
      href="academic.kindergarten"
      buttonText="Read more"
    />
    <x-card-component 
      title="Primary" 
      description="The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to 'Naviglio' where you can enjoy the main night life in Barcelona." 
      image="https://images.unsplash.com/photo-1540553016722-983e48a2cd10?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" 
      buttonText="Read more" 
      href="academic.primary"
    />
    <x-card-component 
      title="Secondary" 
      description="The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to 'Naviglio' where you can enjoy the main night life in Barcelona." 
      image="https://images.unsplash.com/photo-1540553016722-983e48a2cd10?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" 
      buttonText="Read more" 
      href="academic.secondary"
    />

  </div>


</div>


@endsection