@if ($paginator->hasPages())
    <nav class="mt-3 text-center">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a style="color: {{$user->background_color}}; background-color: {{$user->navigation_color}}; border: 0; font-size: 1.5rem" class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        Previous
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a style="color: {{$user->background_color}}; background-color: {{$user->navigation_color}}; border: 0; font-size: 1.5rem" class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page" style="border: 0">
                                <a style="color: {{$user->navigation_color}}; background-color: {{$user->background_color}}; border: 0; font-size: 1.5rem" class="page-link" href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li style="border: 0" class="page-item"><a style="color: {{$user->background_color}}; background-color: {{$user->navigation_color}}; border: 0; font-size: 1.5rem" class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a style="text-decoration:none; color: {{$user->background_color}}; background-color: {{$user->navigation_color}}; border: 0; font-size: 1.5rem" class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a style="text-decoration:none; color: {{$user->background_color}}; background-color: {{$user->navigation_color}}; border: 0; font-size: 1.5rem" class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next</a>
                </li>
            @endif
        </ul>
    </nav>
@endif


{{-- <div class="text-center">
    <ul class="pagination">
        <li><a href="?p=0" data-original-title="" title="">1</a></li>
        <li><a href="?p=1" data-original-title="" title="">2</a></li>
    </ul>
</div> --}}
