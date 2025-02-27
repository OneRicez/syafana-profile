@extends('layouts.app')

@section('title', 'About')

@section('content')
<section class="scroll-smooth">
  <div class="text-5xl font-ssprobold px-10 text-[#091B8C] py-5 text-center">ABOUT US</div>

  <section id="history" class="px-10 py-5" style="scroll-margin-top: 4rem">
    <p class="text-3xl font-ssprobold  text-[#091B8C]  font-light">History</p>
    <div class="flex flex-row gap-3">
      {!! clean($history->content) !!}
      <img src="{{ asset('storage/' . $history_image->img_path) }}" alt="{{ $history_image->alt }}" class="w-1/4 h-1/2" />

    </div>
  </section>

  <section id="vision_mission" class="px-10 py-5" style="scroll-margin-top: 4rem">
    <p class="text-3xl font-ssprobold  text-[#091B8C] mb-2">Vision & Mission</p>

    <div class="grid grid-cols-2 gap-8 text-center py-3">
      <div >
        <span class="text-3xl font-ssprobold  text-[#091B8C]  font-light">Our Vision</span>
        <p class="text-3xl font-ssprobold  text-[#091B8C]  font-light mt-4">” …to be the Islamic school reference in Indonesia as a foundation in the developing of a civilized generation”</p>
      </div>
      <div>
        <span class="text-3xl font-ssprobold  text-[#091B8C]  font-light">Our Mission</span>
        <ul class="list-disc list-inside text-left mt-5 mx-16">
          <li>Lore</li>
          <li>EM</li>
          <li>Ipsu</li>
        </ul>
      </div>
    </div>
  </section>

  <section id="welcome" class="px-10 py-5" style="scroll-margin-top: 4rem">
    <span class="text-3xl font-ssprobold  text-[#091B8C]  font-light">Welcome</span>
    <div class="flex flex-row gap-3">
      <figure>
        <img src="{{ asset('storage/' . $welcome_image->img_path) }}" alt="{{ $history_image->alt }}" class="w-1/2 h-3/4" />
        <figcaption>{{$welcome_image->alt}}</figcaption>
      </figure>
      {!! clean($welcome->content) !!}
    </div>
  </section>
    
  <section id="orgstructure" class="px-10 py-5 flex flex-col items-center" style="scroll-margin-top: 4rem">
    <p class="text-3xl font-ssprobold text-[#091B8C] font-light justify-start">Organization Structure</p>
    @foreach ($org_structure as $item)
      <img src="{{ asset('storage/' . $item['img_path']) }}" alt="{{ $item['alt'] }}" class="w-1/2 h-3/4 mt-5" />
    @endforeach
  </section>

</section>
@endsection