<div class="relative">
  <img src="{{ $image }}" class="w-full h-[200px] object-cover rounded-lg">
  <div class="absolute top-2 right-2">
      @switch($status)
          @case('published')
              <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-500 text-white">
                  Published
              </span>
              @break
          @case('draft')
              <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-500 text-white">
                  Draft
              </span>
              @break
          @case('takendown')
              <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-500 text-white">
                  Taken Down
              </span>
              @break
      @endswitch
  </div>
</div>