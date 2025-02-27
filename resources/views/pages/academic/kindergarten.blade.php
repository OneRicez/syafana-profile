@extends('layouts.app')

@section('title','Kindergarten')
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
      'label' => 'Kindergarten',
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

  <div class="text-4xl font-ssprobold text-[#006CB5]">
    Kindergarten 
  </div>
  <div>
    <span class="text-2xl font-sspro text-[#006CB5]">{!!clean($kindergarten['description'])!!}</span>
  </div>

  <div class="flex flex-col lg:flex-row mx-auto justify-center lg:justify-around py-5">
    <img src="{{asset('storage/' . $kindergarten['img-1'])}}" alt="Image 1" class="h-auto max-w-md mx-auto mb-4">
    <img src="{{asset('storage/' . $kindergarten['img-2'])}}" alt="Image 2" class="h-auto max-w-md mx-auto">
  </div>
  
  
  {{-- Grid --}}
  <div class="py-8 grid grid-cols-1 lg:grid-cols-3 text-center px-2 font-sspro gap-x-2 ">
    <x-academic-kindergarten 
    title="Toodler"
    :days="$kindergarten['toodler-day']"
    :time="$kindergarten['toodler-hours']"
    :points="$kindergarten['toodler-desc']"
    />
    <x-academic-kindergarten 
    title="Playgroup"
    :days="$kindergarten['playgroup-day']"
    :time="$kindergarten['playgroup-hours']"
    :points="$kindergarten['playgroup-desc']"
    />
    <x-academic-kindergarten 
    title="Kindergarten"
    :days="$kindergarten['day']"
    :time="$kindergarten['hours']"
    :points="$kindergarten['desc']"
    />
  </div>
  <div class="text-3xl font-ssprobold text-[#006CB5] pb-5">
    Campus 
  </div>

  <div>
    @foreach ($campuses as $item)
      <x-campus-card 
        :title="$item['title']"
        :alamat="$item['address']"
        :notelp="$item['phone']"
        :img="$item['img']"
        :maps="strip_tags($item['maps'])"
      />
        
    @endforeach

  </div>



</div>
@endsection