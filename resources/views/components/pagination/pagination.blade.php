@props([
    'pagination' => [],
    'label' => null,
])

@php
    $current = $pagination['current'] ?? 1;
    $last = $pagination['last'] ?? 1;
    $from = $pagination['from'] ?? 0;
    $to = $pagination['to'] ?? 0;
    $total = $pagination['total'] ?? 0;
    $previous = $pagination['previous'] ?? null;
    $next = $pagination['next'] ?? null;
    $elements = $pagination['elements'] ?? [];
@endphp

@if($total > 0)
    <nav class="app-pagination" aria-label="Pagination">
        <p class="app-pagination-summary">
            {{ __('general.showing_items', [
                'from' => $from,
                'to' => $to,
                'total' => $total,
                'label' => $label ?? __('general.results'),
            ]) }}
        </p>

        @if($last > 1)
            <div class="app-pagination-links">
                @if($previous)
                    <a href="{{ $previous }}" class="app-pagination-link" aria-label="{{ __('pagination.previous') }}">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @else
                    <span class="app-pagination-link is-disabled">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @endif

                @foreach($elements as $element)
                    @if(is_string($element))
                        <span class="app-pagination-link is-disabled">{{ $element }}</span>
                    @endif

                    @if(is_array($element))
                        @foreach($element as $page => $url)
                            @if($page == $current)
                                <span class="app-pagination-link is-active" aria-current="page">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="app-pagination-link">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if($next)
                    <a href="{{ $next }}" class="app-pagination-link" aria-label="{{ __('pagination.next') }}">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                @else
                    <span class="app-pagination-link is-disabled">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                @endif
            </div>
        @endif
    </nav>
@endif