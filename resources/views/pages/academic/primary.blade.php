@extends('layouts.app')
@section('title','Primary')
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
      'label' => 'Primary',
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
    Primary 
  </span>
  <div>
    <span class="text-2xl font-sspro text-[#006CB5]">{!!clean($primary['description'])!!}</span>
  </div>
  <div class=" mt-4 text-2xl font-sspro font-bold text-[#006CB5]">School Day</div>
  <section class="flex justify-between items-start">
    <!-- Text content container -->
    <div class="lg:justify-between justify-start w-1/5 lg:w-2/5 flex flex-row gap-x-8">
      <div class="">
        <span class="text-xl font-sspro text-[#006CB5]">Primary 1-3</span>
        <div class="flex items-center gap-2 py-2">
          <img src="{{ asset('icons/calendar-b.svg') }}" alt="Calendar" class="w-5 h-5">
          <p class="text-xl font-sspro">{!!clean($primary['13-days'])!!}</p>
        </div>
        <div class="flex items-center gap-2">
          <img src="{{ asset('icons/clock-b.svg') }}" alt="Clock" class="w-5 h-5">
          <p class="text-xl font-sspro">{!!clean($primary['13-hours'])!!}</p>
        </div>
      </div>
      <div>
        <span class="text-xl font-sspro text-[#006CB5]">Primary 4-6</span>
        <div class="flex items-center gap-2 py-2">
          <img src="{{ asset('icons/calendar-b.svg') }}" alt="Calendar" class="w-5 h-5">
          <p class="text-xl font-sspro">{!!clean($primary['46-hours'])!!}</p>
        </div>
        <div class="flex items-center gap-2">
          <img src="{{ asset('icons/clock-b.svg') }}" alt="Clock" class="w-5 h-5">
          <p class="text-xl font-sspro">{!!clean($primary['46-days'])!!}</p>
        </div>
      </div>
    </div>
    <!-- Image container -->
    <div class="flex-shrink-0">
      <img src="{{asset('storage/'. $primary['images'][1])}}" alt="" class="max-w-48 h-auto lg:max-w-md mx-auto pb-4">
    </div>
  </section>
  
  <section class="bg-gray-100 py-2 my-4">
    <div class="text-4xl font-ssprobold text-[#006CB5] text-center">Curriculum</div>
    <div class="grid grid-cols-1 lg:grid-cols-4 divide-y lg:divide-y-0 lg:divide-x divide-dashed divide-red-500 text-center py-2">
      <div class="p-4 flex flex-col items-center border-b lg:border-b-0 lg:border-r border-dashed border-red-500">
        <p class="font-semibold font-sspro">National Curriculum</p>
        <img src="{{asset('icons/flag-indo.svg')}}" alt="" class="w-8 h-8 my-2">
        <p class="p-3 font-sspro">{!!clean($primary['national'])!!}</p>
      </div>
      <div class="p-4 flex flex-col items-center border-b lg:border-b-0 lg:border-r border-dashed border-red-500">
        <p class="font-semibold font-sspro">International Curriculum</p>
        <img src="{{asset('icons/global-c.svg')}}" alt="" class="w-8 h-8 my-2">
        <p class="p-3 font-sspro">{!!clean($primary['international'])!!}</p>
      </div>
      <div class="p-4 flex flex-col items-center border-b lg:border-b-0 lg:border-r border-dashed border-red-500">
        <p class="font-semibold font-sspro">Al-Azhar Cairo Curriculum</p>
        <img src="{{asset('icons/mosque-c.svg')}}" alt="" class="w-8 h-8 my-2">
        <p class="p-3 font-sspro">{!!clean($primary['alazhar'])!!}</p>
      </div>
      <div class="p-4 flex flex-col items-center">
        <p class="font-semibold font-sspro">Competitive Extra-curricular</p>
        <img src="{{asset('icons/trophy-c.svg')}}" alt="" class="w-8 h-8 my-2">
        <p class="p-3 font-sspro">{!!clean($primary['comp'])!!}</p>
      </div>
    </div>
  </section>
  

  <section class="px-10">
    <div class="text-4xl font-ssprobold text-[#006CB5] text-center py-4">Subjects</div>
    <div class="flex justify-between">
      <div class="list-disc text-1xl font-sspro">
          {!!$primary['subjects']!!}
      </div>
      <div>
        <img src="{{asset('storage/'. $primary['images'][2]) }}" alt="" class="max-w-48 h-auto lg:max-w-md mx-auto pb-4">
      </div>
    </div>
  </section>


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

@endsection

