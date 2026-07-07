@php
    $pagination = [
        'current' => $paginator->currentPage(),
        'last' => $paginator->lastPage(),
        'from' => $paginator->firstItem(),
        'to' => $paginator->lastItem(),
        'total' => $paginator->total(),
        'previous' => $paginator->previousPageUrl(),
        'next' => $paginator->nextPageUrl(),
        'elements' => $elements,
    ];
@endphp

<x-pagination.pagination
    :pagination="$pagination"
    :label="$label ?? __('general.results')"
/>