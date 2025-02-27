@extends('layouts.app')
@section('title','Secondary')
@section('content')
<div class=" mx-auto px-6 lg:px-8">
  <x-breadcrumb 
  :items="[
    [
      'label' => 'Academic',
      'url' => route('academic'),
      'dropdown' => [
      ]
    ],
    [
      'label' => 'Secondary',
      'url' => '#',
      'dropdown' => [
          ['label' => 'Primary', 'url' => route('academic.primary')],
          ['label' => 'Secondary', 'url' => route('academic.secondary')],
          ['label' => 'Kindergarten', 'url' => route('academic.kindergarten')],
          ['label' => 'Boarding', 'url' => route('academic.boarding')]
      ]
    ],
  ]"
  :hasDropdown="true"
  />

  <span class="text-4xl font-ssprobold text-[#006CB5]">
    Secondary 
  </span>
  <div>
    <span class="text-2xl font-sspro text-[#006CB5]">"Secondary level is a continuity of the primary programs when the 3 curriculums, National, Cambridge (IGCSE) and Al-Azhar Cairo are implemented. In addition, students at this level have started to prepare themeselves to be junior researchers, where all subjects are taught in the form of project-based approach".</span>
  </div>

  <div class="mt-4">School Day</div>
  <div class="flex flex-col justify-start ">
    <div class="flex  items-center gap-2 py-2">
      <img src="{{ asset('icons/calendar-b.svg') }}" alt="Calendar" class="w-5 h-5">
      <p>Monday - Friday </p>
    </div>
    <div class="flex items-center gap-2">
      <img src="{{ asset('icons/clock-b.svg') }}" alt="Clock" class="w-5 h-5">
      <p>07.00 - 15.30</p>
    </div>
  </div>

  <div class="container mx-auto">
    @foreach ($campuses as $item)
      <x-campus-card 
        :title="$item['title']"
        :alamat="$item['address']"
        :notelp="$item['phone']"
        :img="$item['image']"
        :maps="strip_tags($item['maps'])"
      />  
    @endforeach
  </div>
</div>
@endsection