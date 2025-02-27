<div class="bg-white rounded-lg shadow p-6">
  <h2 class="text-xl font-semibold mb-4">{{$title}}</h2>
  <div class="h-40 bg-gray-200 mb-4">
      <!-- Embed Google Map here -->
      <iframe src="{{$map}}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
  <p class="text-gray-600 mb-2">{{$address}}</p>
  <p class="text-gray-600 mb-4">{{$phone}}</p>
</div>