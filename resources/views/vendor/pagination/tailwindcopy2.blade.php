
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center mt-6">
        <ul class="flex items-center space-x-2">

            {{-- Page précédente --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-3 py-2 rounded-full bg-gray-200 text-gray-400 cursor-not-allowed">←</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-3 py-2 rounded-full bg-blue-500 text-white hover:bg-blue-600 transition">
                        ←
                    </a>
                </li>
            @endif

            {{-- Liens numérotés --}}
            @foreach ($elements as $element)
                {{-- "..." --}}
                @if (is_string($element))
                    <li>
                        <span class="px-3 py-2 text-gray-500">...</span>
                    </li>
                @endif

                {{-- Tableau de liens --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-3 py-2 rounded-2xl bg-blue-600 text-white font-semibold shadow">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-3 py-2 rounded-2xl bg-gray-100 text-blue-700 hover:bg-blue-500 hover:text-white transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Page suivante --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-3 py-2 rounded-full bg-blue-500 text-white hover:bg-blue-600 transition">
                        →
                    </a>
                </li>
            @else
                <li>
                    <span class="px-3 py-2 rounded-full bg-gray-200 text-gray-400 cursor-not-allowed">→</span>
                </li>
            @endif

        </ul>
    </nav>
@endif

