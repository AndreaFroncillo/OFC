@props([
'name' => 'phone',
'value' => null,
'required' => false,
'variant' => 'management',
'placeholder' => null,
])

@php
$groupClass = $variant === 'management'
? 'management-form-group'
: 'mb-3 flex-fill';
@endphp

<div class="{{ $groupClass }}">
    @if($variant === 'management')
    <label for="{{ $name }}_display">{{ __('auth.phone') }}</label>
    @endif

    <input
        type="tel"
        id="{{ $name }}_display"
        value="{{ $value }}"
        placeholder="{{ $placeholder ?? __('auth.phone') }}"
        class="{{ $variant === 'management' ? '' : 'form-control' }}"
        data-phone-input
        data-phone-target="{{ $name }}"
        @required($required)>

    <input
        type="hidden"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $value }}">

    @error($name)
    <small>{{ $message }}</small>
    @enderror
</div>