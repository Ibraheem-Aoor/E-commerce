@if ($paginator->hasPages())
    <ul class="page-numbers">
        @if ($paginator->hasMorePages())

            {{-- Next --}}
            <li class="page-item"><a wire:click="nextPage" class="page-number-item"><i
                        class="icon ion-ios-arrow-forward"></i></a></li>
        @else
            <li class="page-item"><a class="page-number-item " style="cursor: not-allowed"><i
                        class="icon ion-ios-arrow-forward"></i></a></li>
        @endif
        @php
            $i = 1;
        @endphp
        {{-- pagesBetween --}}
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-number-item "
                              href="/?page={{$page}}">{{$page}}</a></li>
                        @else
                        <li><a class="page-number-item "   href="/?page={{$page}}"
                              >{{$page}}</a></li>
                    @endif
                @endforeach
            @endif
            </li>
        @endforeach
        {{-- pagesBetween --}}

        {{-- prev --}}
        @if ($paginator->onFirstPage())
            <li class="page-item"><a class="page-number-item " style="cursor: not-allowed"><i
                        class="icon ion-ios-arrow-back"></i></a></li>
        @else
            <li class="page-item"><a class="page-number-item " wire:click="previousPage"><i
                        class="icon ion-ios-arrow-back"></i></a></li>
        @endif
    </ul>
@endif
