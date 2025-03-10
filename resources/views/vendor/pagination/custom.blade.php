@if ($paginator->hasPages())
    <div class="flex items-center justify-between">
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-start space-x-1">
            <div class="text-sm text-gray-700 mt-2">
                Showing
                <span class="font-semibold">{{ $paginator->firstItem() }}</span>
                to
                <span class="font-semibold">{{ $paginator->lastItem() }}</span>
                of
                <span class="font-semibold">{{ $paginator->total() }}</span>
                entries
            </div>
        </nav>
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-end space-x-1">
            {{-- Tombol Sebelumnya --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1 text-gray-400 cursor-not-allowed">&lt;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="px-3 py-1 border rounded hover:bg-gray-200">&lt;</a>
            @endif

            {{-- Tampilkan Halaman --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-1">...</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-1 bg-blue-500 text-white rounded">{{ $page }}</span>
                        @else
                            {{-- Tampilkan hanya halaman 1, halaman terakhir, dan halaman sekitar halaman aktif --}}
                            @if ($page == 1 || $page == $paginator->lastPage() || abs($page - $paginator->currentPage()) <= 1)
                                <a href="{{ $url }}"
                                    class="px-3 py-1 border rounded hover:bg-gray-200">{{ $page }}</a>
                            @endif

                            {{-- Tambahkan "..." setelah halaman 1 jika halaman aktif lebih dari 3 --}}
                            @if ($page == 2 && $paginator->currentPage() > 3)
                                <span class="px-3 py-1">...</span>
                            @endif

                            {{-- Tambahkan "..." sebelum halaman terakhir jika halaman aktif lebih dari 3 halaman dari akhir --}}
                            @if ($page == $paginator->lastPage() - 1 && $paginator->currentPage() < $paginator->lastPage() - 2)
                                <span class="px-3 py-1">...</span>
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach


            {{-- Tombol Berikutnya --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 border rounded hover:bg-gray-200">&gt;</a>
            @else
                <span class="px-3 py-1 text-gray-400 cursor-not-allowed">&gt;</span>
            @endif
        </nav>
    </div>
@endif
