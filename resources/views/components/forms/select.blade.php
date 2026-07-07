@props([
    'name',
    'label' => null,
    'value' => null,
    'options' => [],
    'placeholder' => null,
    'required' => false,
    'variant' => 'management',
    'full' => false,
])

@php
    $selectedValue = old($name, $value);
@endphp

<x-forms.field
    :name="$name"
    :label="$label"
    :required="$required"
    :variant="$variant"
    :full="$full"
>
    <select
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $attributes }}
        @required($required)
    >
        @if($placeholder)
            <option value="" @selected(blank($selectedValue))>
                {{ $placeholder }}
            </option>
        @endif

        @foreach($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" @selected((string) $selectedValue === (string) $optionValue)>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
</x-forms.field>