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
      'label' => 'Primary',
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

  <span class="text-4xl font-ssprobold text-[#006CB5]">
    Primary 
  </span>
  <div>
    <span class="text-2xl font-sspro text-[#006CB5]">The aim of our school is to realize the full potential of all students within dynamic learning environment</span>
  </div>
  <div class=" mt-4 text-2xl font-sspro font-bold text-[#006CB5]">School Day</div>
  <section class="flex justify-between items-start">
    <!-- Text content container -->
    <div class="lg:justify-between justify-start w-1/5 lg:w-2/5 flex flex-row gap-x-8">
      <div class="">
        <span class="text-xl font-sspro text-[#006CB5]">Primary 1-3</span>
        <div class="flex items-center gap-2 py-2">
          <img src="{{ asset('icons/calendar-b.svg') }}" alt="Calendar" class="w-5 h-5">
          <p class="text-xl font-sspro">Monday - Friday</p>
        </div>
        <div class="flex items-center gap-2">
          <img src="{{ asset('icons/clock-b.svg') }}" alt="Clock" class="w-5 h-5">
          <p class="text-xl font-sspro">07:30 - 14:00</p>
        </div>
      </div>
      <div>
        <span class="text-xl font-sspro text-[#006CB5]">Primary 4-6</span>
        <div class="flex items-center gap-2 py-2">
          <img src="{{ asset('icons/calendar-b.svg') }}" alt="Calendar" class="w-5 h-5">
          <p class="text-xl font-sspro">Monday - Friday</p>
        </div>
        <div class="flex items-center gap-2">
          <img src="{{ asset('icons/clock-b.svg') }}" alt="Clock" class="w-5 h-5">
          <p class="text-xl font-sspro">07:30 - 15:00</p>
        </div>
      </div>
    </div>
    <!-- Image container -->
    <div class="flex-shrink-0">
      {{-- <img src="{{ asset('img/kinder-1.jpg') }}" class="h-[300px] w-[400px] pb-4"> --}}
    </div>
  </section>
  
  <section class="bg-gray-100 py-2 my-4">
    <div class="text-4xl font-ssprobold text-[#006CB5] text-center">Curriculum</div>
    <div class="grid grid-cols-1 lg:grid-cols-4 divide-y lg:divide-y-0 lg:divide-x divide-dashed divide-red-500 text-center py-2">
      <div class="p-4 flex flex-col items-center border-b lg:border-b-0 lg:border-r border-dashed border-red-500">
        <p class="font-semibold font-sspro">National Curriculum</p>
        <img src="{{asset('icons/flag-indo.svg')}}" alt="" class="w-8 h-8 my-2">
        <p class="p-3 font-sspro">Syafana Islamic School is a school that thinks globally but doesn't forget its own roots. To make students understand about our country, cultures, and imbedded with nationalism, we enrich students by learning Bahasa, Social studies and Civics knowledge based on DIKNAS curriculum.</p>
      </div>
      <div class="p-4 flex flex-col items-center border-b lg:border-b-0 lg:border-r border-dashed border-red-500">
        <p class="font-semibold font-sspro">International Curriculum</p>
        <img src="{{asset('icons/global-c.svg')}}" alt="" class="w-8 h-8 my-2">
        <p class="p-3 font-sspro">Syafana Islamic School has a commitment to educate the students to have a broader knowledge not only nationally but also internationally. Therefore, we encourage students to understand and learn about science and maths done in full English. Since Syafana Islamic School has English and Arabic environments, students must speak in English for their daily communication. In supporting this program, we have qualified ESL teachers and apply TIP (Total Immersion Program) in our daily communication.</p>
      </div>
      <div class="p-4 flex flex-col items-center border-b lg:border-b-0 lg:border-r border-dashed border-red-500">
        <p class="font-semibold font-sspro">Al-Azhar Cairo Curriculum</p>
        <img src="{{asset('icons/mosque-c.svg')}}" alt="" class="w-8 h-8 my-2">
        <p class="p-3 font-sspro">Syafana Islamic School has a strong foundation of Islamic values which is based on Al-Qur'an and Hadits. In order to support this goal, we have adopted Al-Azhar Cairo's curriculum for Islamic studies. There are Islamic lessons (delivered in Arabic which start from Primary 4 in semester 2), Arabic, and Tahfizh.  Besides that, Syafana Islamic Students are obligated to memorize 6 juz  in six years. We also encourage students to communicate in Arabic with teachers and friends at school.</p>
      </div>
      <div class="p-4 flex flex-col items-center">
        <p class="font-semibold font-sspro">Competitive Extra-curricular</p>
        <img src="{{asset('icons/trophy-c.svg')}}" alt="" class="w-8 h-8 my-2">
        <p class="p-3 font-sspro">Syafana Islamic School assures that each child is excellent. In order to facilitate them, we offer 20 kinds of Extra-curricular programs which students can follow, some of them are futsal, basketball, badminton, angklung, traditional dance, science club, music, pencaksilat, young entrepreneur, broadcasting, design and more.</p>
      </div>
    </div>
  </section>
  

  <section class="px-10">
    <div class="text-4xl font-ssprobold text-[#006CB5] text-center py-4">Subjects</div>
    <div class="flex justify-between">
      <div>
        <ul class="list-disc text-1xl font-sspro">
          <li>Tahfizh (reciting Qur'an)</li>
            <li>Islamic Studies</li>
            <li>Science</li>
            <li>Mathematics</li>
            <li>Bahasa</li>
            <li>Arabic</li>
            <li>English</li>
            <li>Social studies</li>
            <li>Civics</li>
            <li>Arts</li>
            <li>Physical Education</li>
            <li>Information and Technology</li>
        </ul>
      </div>
      <div>
        <img src="{{asset('img/kinder-1.jpg')}}" alt="" class="max-w-48 h-auto lg:max-w-md mx-auto pb-4">
      </div>
    </div>
  </section>

  {{-- <x-campus-card/> --}}
</div>
@endsection

