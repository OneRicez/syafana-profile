@props(['imageUrl', 'title', 'description'])

<div class="relative group">
    <!-- Image -->
    <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $imageUrl) }}" alt="{{ $title }}">

    <!-- Overlay with Title and Description (Bottom 1/4 of the image) -->
    <div class="absolute bottom-0 left-0 right-0 h-1/3 bg-black bg-opacity-50 opacity-100 transition-opacity  rounded-b-lg">
        <div class="p-2 text-white">
            <h3 class="text-lg font-semibold">{{ $title }}</h3>
            <p class="text-sm">{{ $description }}</p>
        </div>
    </div>
</div>