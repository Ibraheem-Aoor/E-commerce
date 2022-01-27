@if ($paginator->hasPages())
    <ul class="page-numbers">
        {{-- prev --}}
        @if ($paginator->onFirstPage())
            <li class="page-item"><a class="page-number-item " style="cursor: not-allowed"><i
                        class="fa fa-chevron-left"></i></a></li>
        @else
            <li class="page-item"><a class="page-number-item " wire:click="previousPage"><i
                        class="fa fa-chevron-left"></i></a></li>
        @endif
        @php
            $i = 1;
        @endphp
        {{-- pagesBetween --}}
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item" style="background-color: red;color:white">
                            <a class="page-number-item " href="/shop/?page={{ $page }}">{{ $page }}</a>
                        </li>
                    @else
                        <li><a class="page-number-item " href="/shop/?page={{ $page }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
            </li>
        @endforeach
        {{-- pagesBetween --}}



        @if ($paginator->hasMorePages())

            {{-- Next --}}
            <li class="page-item"><a wire:click="nextPage" class="page-number-item"><i
                        class="fa fa-chevron-right"></i></a></li>
        @else
            <li class="page-item"><a class="page-number-item " style="cursor: not-allowed"><i
                        class="fa fa-chevron-right" aria-hidden="true"></i>
                        </a></li>
        @endif
    </ul>
@endif
