<div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
    <div class="h-48 bg-gray-200">
        @if($image)
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover">
        @endif
    </div>
    <div class="p-6 mt-4">
        <h2 class="text-xl font-bold text-center mb-4">
            @if($url)
                <a href="{{ $url }}" class="hover:text-blue-800 transition-colors duration-200">
                    {{ $title }}
                </a>
            @else
                {{ $title }}
            @endif
        </h2>
        <div class="text-gray-500 text-sm text-center">
            By {{ $author }}
            @if($date)
                <span class="mx-2">•</span>
                {{ $date }}
            @endif
        </div>
    </div>
</div>