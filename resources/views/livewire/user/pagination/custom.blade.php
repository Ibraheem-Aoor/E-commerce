<nav aria-label="Page navigation example">
    @if ($paginator->hasPages())
        <ul class="pagination">
            {{-- Prev --}}
            @if ($paginator->onFirstPage())
                <li class="page-item" tyle="cursor:not-allowed">
                    <a class="page-link" href="javascript:;" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            @else
                <li class="page-item" tyle="cursor: ىnot-allowed">
                    <a class="page-link" href="javascript:;" aria-label="Previous" wire:click="previousPage">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            @endif
            {{-- PagesBetween --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link"
                                    href="javascript:;">{{ $page }}</a></li>
                        @else
                            <li class="page-item "><a class="page-link"
                                    href="/{{$targetPage}}?page={{ $page }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach


            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="javascript:;" aria-label="Next" wire:click="nextPage">
                        <i class="fa fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" aria-label="Next" style="cursor: not-allowed;">
                        <i class="fa fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            @endif

        </ul>
    @endif
</nav>

{{-- --------------------------------------------------------------- --}}
