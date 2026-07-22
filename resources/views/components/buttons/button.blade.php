@props([
'type' => 'button',
'variant' => 'primary',
'href' => null,
'icon' => null,
'disabled' => false,
'size' => 'md',
])

@php
$variantClass = match ($variant) {
'secondary' => 'app-button-secondary',
'success' => 'app-button-success',
'danger' => 'app-button-danger',
'warning' => 'app-button-warning',
'info' => 'app-button-info',
'outline' => 'app-button-outline',
'link' => 'app-button-link',
'public-primary' => 'app-button-public-primary',
'public-outline' => 'app-button-public-outline',
'footer' => 'app-button-footer',
default => 'app-button-primary',
};

$sizeClass = match ($size) {
'sm' => 'app-button-sm',
'lg' => 'app-button-lg',
default => 'app-button-md',
};

$classes = trim("app-button {$variantClass} {$sizeClass}");
@endphp

@if($href)
<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
    <i class="{{ $icon }}"></i>
    @endif

    <span>{{ $slot }}</span>
</a>
@else
<button
    type="{{ $type }}"
    @disabled($disabled)
    @if($type==='submit' ) data-submit-button @endif
    {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
    <i class="{{ $icon }}"></i>
    @endif

    <span>{{ $slot }}</span>
</button>
@endif