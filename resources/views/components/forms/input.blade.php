@props([
    'type' => 'text',
    'name',
    'label' => null,
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'variant' => 'management',
    'full' => false,
])

@php
    $inputValue = old($name, $value);
@endphp

<x-forms.field
    :name="$name"
    :label="$label"
    :required="$required"
    :variant="$variant"
    :full="$full"
>
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $inputValue }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes }}
        @required($required)
    >
</x-forms.field>