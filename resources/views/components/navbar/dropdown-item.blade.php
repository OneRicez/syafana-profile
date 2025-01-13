@props(['label'])

<div x-cloak x-data="{ open: false }" class="relative">
    <button @click="open = !open" 
            class="hover:text-gray-200 flex items-center px-2 py-4">
        {{ $label }}
        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
    
    <div x-show="open" x-cloak
         @click.away="open = false"
         class="absolute bg-white text-gray-800 mt-2 py-2 w-40 rounded shadow-lg">
        {{ $slot }}
    </div>
</div>