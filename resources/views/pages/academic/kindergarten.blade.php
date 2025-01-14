@extends('layouts.app')


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
          ['label' => 'Kindergarten', 'url' => route('academic.kindergarten')]
      ]
    ],

      
  ]"
  :hasDropdown="true"
  />

  <div class="text-4xl font-ssprobold text-[#006CB5]">
    Kindergarten 
  </div>
  <div>
    <span class="text-2xl font-sspro text-[#006CB5]">Our pre-school levels range from Toddler to Kindergarten. We use Bahasa, English and Arabic as the main languages in our daily practice.</span>
  </div>

  <div class="flex flex-col lg:flex-row mx-auto justify-center lg:justify-around py-5">
    <img src="https://www.w3schools.com/images/w3schools_green.jpg" alt="Image 1" class="h-auto max-w-md mx-auto mb-4">
    <img src="https://www.w3schools.com/images/w3schools_green.jpg" alt="Image 2" class="h-auto max-w-md mx-auto">
  </div>
  
  
  {{-- Grid --}}
  <div class="py-8 grid grid-cols-1 lg:grid-cols-3 text-center px-2 font-sspro gap-x-2 ">
    <x-academic-kindergarten 
    title="Toodler"
    days="Monday - Thursday"
    time="08:00 - 09:30"
    :points="[
        'How to adjust to the environment at school.',
        'How to socialise with friends and express their emotions appropriately.',
        'How to develop their motor skills and practice their physical movements.',
        'How to communicate, listening, responding and speaking.'
    ]"
    />
    <x-academic-kindergarten 
    title="Playgroup"
    days="Monday - Thursday"
    time="08:00 - 10:30"
    :points="[
      'How to adjust to their environment.',
      'How to use different vocabulary words.',
      'How to socialize well in the school environment.'
    ]"
    />
    <x-academic-kindergarten 
    title="Kindergarten"
    days="Monday - Friday"
    time="08.00 - 11.30"
    :points="[
      'About world around them and different concepts (Islamic, Science, Maths, Social).',
      'To begin to communicate in Arabic and English.',
      'How to follow instructions.',
      'To memorize Al Quran at a young age.',
      'To Pray and Recite Suplication.',
    ]"
    />
  </div>
  <div class="text-3xl font-ssprobold text-[#006CB5] pb-5">
    Campus 
  </div>
  <x-campus-card 
    :title="'Graha Raya Campus'" 
    :alamat="'Jl. Graha Raya No.123, Tangerang  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nostrum laboriosam maiores nihil alias molestias repellendus, porro recusandae ratione. Nisi alias optio ad, deleniti vel quibusdam repellat consequuntur explicabo voluptatem?'" 
    :notelp="'(021) 123-4567'" 
  />
  <x-campus-card 
    :title="'Graha Raya Campus'" 
    :alamat="'Jl. Graha Raya No.123, Tangerang  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nostrum laboriosam maiores nihil alias molestias repellendus, porro recusandae ratione. Nisi alias optio ad, deleniti vel quibusdam repellat consequuntur explicabo voluptatem?'" 
    :notelp="'(021) 123-4567'" 
  />
    <x-campus-card 
      :title="'Graha Raya Campus'" 
      :alamat="'Jl. Graha Raya No.123, Tangerang  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nostrum laboriosam maiores nihil alias molestias repellendus, porro recusandae ratione. Nisi alias optio ad, deleniti vel quibusdam repellat consequuntur explicabo voluptatem?'" 
      :notelp="'(021) 123-4567'" 
    />



</div>
@endsection