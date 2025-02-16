@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-end mt-4">
        <div class="w-full md:w-3/4">
            <ul class="inline-flex items-center -space-x-px">
                {{-- Tombol Previous --}}
                @if ($paginator->onFirstPage())
                    <li>
                        <span class="px-5 py-3 text-gray-400 text-lg font-semibold cursor-not-allowed">&laquo; Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" class="px-5 py-3 bg-gray-200 text-gray-700 text-lg font-semibold hover:bg-gray-300">
                            &laquo; Previous
                        </a>
                    </li>
                @endif

                {{-- Nomor Halaman --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li><span class="px-5 py-3 text-gray-500 text-lg">{{ $element }}</span></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li>
                                    <span class="px-5 py-3 bg-blue-500 text-white text-lg font-bold">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}" class="px-5 py-3 bg-gray-200 text-gray-700 text-lg font-semibold hover:bg-gray-300">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Tombol Next --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" class="px-5 py-3  bg-gray-200 text-gray-700 text-lg font-semibold hover:bg-gray-300">
                            Next
                        </a>
                    </li>
                @else
                    <li>
                        <span class="px-5 py-3 text-gray-400 text-lg font-semibold cursor-not-allowed">Next &raquo;</span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
