<a href="{{ $url }}" class="block bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
    <div class="h-64 bg-gray-200 relative"> <!-- Tinggi gambar diubah menjadi h-64 -->
        @if($image)
            <img src="{{ asset('storage/' . $image) }}" alt="{{ $title }}" class="w-full h-full object-cover">
            
            <!-- Label tanggal di kanan atas -->
            @if($date)
                @php
                    // Format tanggal: "12\n Mei 2023"
                    $formattedDate = \Carbon\Carbon::parse($date)->translatedFormat('d F Y');
                @endphp
                <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-3 py-2 rounded-lg shadow-sm text-center leading-tight">
                    {!! nl2br(e($formattedDate)) !!}
                </div>
            @endif
        @endif
    </div>
    <div class="p-6 mt-4">
        <h2 class="text-xl font-bold text-center mb-4">
            {{ $title }} <!-- Judul tidak perlu tag <a> lagi karena seluruh card sudah klikable -->
        </h2>
        <div class="text-gray-500 text-sm text-center">
            By {{ $author }}
        </div>
    </div>
</a>