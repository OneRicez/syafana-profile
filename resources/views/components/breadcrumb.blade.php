@props(['items' => [], 'hasDropdown' => false])

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-2 md:space-x-3">
        <li class="inline-flex items-center">
            <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
                Home
            </a>
        </li>

        @foreach($items as $key => $item)
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    @if(count($item['dropdown']) !== 0)
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="inline-flex items-center text-sm font-medium {{  last(Request::segments()) === strtolower($item['label']) ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} py-2">
                                {{ $item['label'] }}
                                <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                            <div 
                                x-show="open" 
                                @click.away="open = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute z-20 right-0 w-48 py-1 mt-2 bg-white rounded-md shadow-xl"
                            >
                                @foreach($item['dropdown'] as $dropdownItem)
                                    @if (strtolower($dropdownItem['label']) !== last(Request::segments()))
                                        <a href="{{ $dropdownItem['url'] }}" 
                                            class="block px-2 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            {{ $dropdownItem['label'] }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>

                    @else
                        <a href="{{ $item['url'] }}" 
                           class="ml-1 text-sm py2 font-medium {{  last(Request::segments()) === strtolower($item['label']) ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }}">
                            {{ $item['label'] }}
                        </a>
                    @endif
                </div>
            </li>
        @endforeach
    </ol>
</nav>