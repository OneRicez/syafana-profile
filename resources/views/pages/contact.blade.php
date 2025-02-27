@extends('layouts.app')
@section('title', 'Contact-Us')
@section('content')
<body class="bg-gray-100">
  <div class="container mx-auto px-4 py-8">
      <h1 class="text-3xl font-bold text-center mb-8">Contact Us</h1>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($contacts as $contact)
            <x-contact-card 
            :title="$contact->campus_name"
            :map="$contact->map_url"
            :address="$contact->address"
            :phone="$contact->phone"
            />
        @endforeach
      </div>
  </div>
@endsection