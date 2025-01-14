{{-- @props(['image', 'title', 'alamat', 'notelp', 'maps', 'bgcolor']) --}}
@props(['title', 'alamat', 'notelp'])

<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-4xl my-4">
  <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{asset('img/alamat-graha.jpg')}}" alt="">
  <div class="flex flex-col justify-between p-4 leading-normal">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$title}}</h5>
      <p class="mb-3 font-normal text-gray-700">{{$alamat}}</p>
      <p class="mb-3 font-normal text-gray-700">{{$notelp}}</p>
  </div>
</div>

<div></div>

