@props(['title', 'days', 'time', 'points' => []])

<div class="bg-white shadow-md rounded-md p-5">
  <span class="font-ssprobold text-2xl text-[#006CB5]">{{ $title }}</span>
  <div class="mt-4">
      <div class="flex justify-center items-center gap-2 py-2">
          <img src="{{ asset('icons/calendar-b.svg') }}" alt="Calendar" class="w-5 h-5">
          <p>{{ $days }}</p>
      </div>
      <div class="flex justify-center items-center gap-2">
          <img src="{{ asset('icons/clock-b.svg') }}" alt="Clock" class="w-5 h-5">
          <p>{{ $time }}</p>
      </div>
  </div>

  <div class="py-3">
      <ul class="pl-5 space-y-1">
          @foreach ($points as $point)
              <li>{{ $point }}</li>
          @endforeach
      </ul>
  </div>
</div>
