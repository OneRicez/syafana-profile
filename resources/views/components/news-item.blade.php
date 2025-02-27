<a href="{{ $url }}" class="block bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
    <div class="h-64 bg-gray-200 relative flex items-center justify-center"> 
        @if($image)
            <img src="{{ asset('storage/' . $image) }}" alt="{{ $title }}" class="w-full h-full object-cover">

            @if($date)
                @php
                    $formattedDate = \Carbon\Carbon::parse($date)->translatedFormat('d F Y');
                @endphp
                <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-3 py-2 rounded-lg shadow-sm text-center leading-tight">
                    {!! nl2br(e($formattedDate)) !!}
                </div>
            @endif
        @endif
    </div>
    <div class="p-6">
        <h2 class="text-xl font-bold text-center mb-2">
            {{ $title }} 
        </h2>
        <div class="text-gray-500 text-sm text-center">
            By {{ $author }}
        </div>
    </div>
</a>
