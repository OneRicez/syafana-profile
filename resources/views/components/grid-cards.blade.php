<div class="bg-white shadow rounded-lg overflow-hidden">
  @if ($record->image)
      <img src="{{ asset('storage/' . $record->image) }}" alt="{{ $record->title }}" class="w-full h-32 object-cover">
  @endif
  <div class="p-4">
      <h2 class="text-lg font-semibold text-gray-800">{{ $record->title }}</h2>
      <p class="text-gray-600 text-sm">
          {{ Str::limit(strip_tags($record->content), 100) }}
      </p>
      <p class="text-sm text-gray-500 mt-2">By: {{ $record->author }}</p>
      <a href="{{ route('news.show', $record->id) }}" class="block mt-4 text-blue-500 hover:underline">
          Read more
      </a>
  </div>
</div>
