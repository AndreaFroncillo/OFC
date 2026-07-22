@props([
'action',
'label' => null,
'icon' => 'fas fa-trash',
'variant' => 'danger',
'confirm' => true,
'confirmMessage' => null,
])

@php
$message = $confirmMessage ?? __('general.confirm_delete');
@endphp

<form
    action="{{ $action }}"
    method="POST"
    {{ $attributes }}
    @if($confirm)
    onsubmit="return confirm('{{ $message }}')"
    @endif>
    @csrf
    @method('DELETE')

    @if($slot->isEmpty())
    <x-buttons.button
        type="submit"
        :variant="$variant"
        :icon="$icon">
        {{ $label ?? __('general.delete') }}
    </x-buttons.button>
    @else
    {{ $slot }}
    @endif
</form>