{{-- @props(['image', 'title', 'alamat', 'notelp', 'maps', 'bgcolor']) --}}
{{-- @props(['title', 'alamat', 'notelp']) --}}

<div class="flex flex-row justify-between">
  <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-4xl my-4">
    <!-- Image Section -->
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{ asset('storage/' . $img) }}" alt="">
  
    <!-- Content Section -->
    <div class="flex flex-col justify-between p-4 leading-normal flex-1">
        <h5 class="text-2xl font-bold tracking-tight text-gray-900">{!! clean($title) !!}</h5>
        <p class="mb-3 font-normal text-gray-700">{!! clean($alamat) !!}</p>
        <p class="mb-3 font-normal text-gray-700">{!! clean($notelp) !!}</p>
    </div>
  
    <!-- Map Section -->
    
  </div>
  
  <div class="w-full md:w-96 h-64 md:h-auto my-4">
    <iframe 
        src="{{ $maps }}" 
        class="w-full h-full rounded-b-lg md:rounded-none md:rounded-e-lg" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade"
    ></iframe>
  </div>
  
</div>

