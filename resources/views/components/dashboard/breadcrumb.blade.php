@props([
'items' => [],
])

<nav class="dashboard-breadcrumb" aria-label="Breadcrumb">
    @foreach($items as $item)
    @if(! $loop->first)
    <i class="fas fa-chevron-right" aria-hidden="true"></i>
    @endif

    @if(! empty($item['url']) && ! $loop->last)
    <a href="{{ $item['url'] }}">
        {{ $item['label'] }}
    </a>
    @else
    <span>
        {{ $item['label'] }}
    </span>
    @endif
    @endforeach
</nav>