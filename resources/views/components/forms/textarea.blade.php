@props([
'name',
'label' => null,
'value' => null,
'placeholder' => null,
'required' => false,
'variant' => 'management',
'rows' => 5,
'full' => false,
])

@php
$textareaValue = old($name, $value);
@endphp

<x-forms.field
    :name="$name"
    :label="$label"
    :required="$required"
    :variant="$variant"
    :full="$full">
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes }}
        @required($required)>{{ $textareaValue }}</textarea>
</x-forms.field>