<div class="space-y-4 flex-1">
  @foreach($comments as $comment)
  <div class="border-b border-gray-200 pb-4 last:border-b-0">
      <p class="text-gray-600">{{ $comment['content'] }}</p>
      <span class="text-sm text-gray-500">- {{ $comment['author'] }}</span>
  </div>
  @endforeach
</div>