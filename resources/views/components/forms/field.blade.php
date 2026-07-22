@props([
'name',
'label' => null,
'required' => false,
'variant' => 'management',
'full' => false,
])

@php
$groupClass = $variant === 'management'
? 'management-form-group'
: 'mb-3 flex-fill';
@endphp

<div class="{{ $groupClass }} {{ $full ? 'management-form-group-full' : '' }}">
    @if($label)
    <label for="{{ $name }}">
        {{ $label }}

        @if($required)
        <span aria-hidden="true">*</span>
        @endif
    </label>
    @endif

    {{ $slot }}

    @error($name)
    <small>{{ $message }}</small>
    @enderror
</div>