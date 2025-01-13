<div class="container mx-auto px-4 py-8">
  <!-- News Header -->
  <div class="mb-8">
      <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded text-xl font-bold">
          NEWS
      </span>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      @foreach ($news as $item)
      <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
          <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-64 object-cover bg-gray-200">
          <div class="p-6">
              <h2 class="text-xl font-bold text-center mb-4">{{ $item->title }}</h2>
              <div class="text-gray-500 text-sm text-center">
                  By {{ $item->author }}
              </div>
          </div>
      </div>
      @endforeach
  </div>

  <!-- Sidebar -->
  <div class="mt-8 md:mt-0 md:col-span-1">
      <!-- Categories Section -->
      <div class="bg-white rounded-lg shadow-md p-6 mb-8">
          <h3 class="text-xl font-bold text-blue-800 mb-4">Categories</h3>
          <ul class="space-y-2">
              @foreach ($categories as $category)
              <li>
                  <a href="#" class="text-gray-600 hover:text-blue-800 transition-colors duration-200">
                      {{ $category->name }}
                  </a>
              </li>
              @endforeach
          </ul>
      </div>

      <!-- Recent Comments Section -->
      <div class="bg-white rounded-lg shadow-md p-6">
          <h3 class="text-xl font-bold text-blue-800 mb-4">Recent Comments</h3>
          <div class="space-y-4">
              @foreach ($comments as $comment)
              <div class="border-b border-gray-200 pb-4 last:border-b-0">
                  <p class="text-gray-600">{{ $comment->content }}</p>
                  <span class="text-sm text-gray-500">{{ $comment->author }}</span>
              </div>
              @endforeach
          </div>
      </div>
  </div>
</div>