@props(['id', 'label'])

<label {{ $attributes->merge([
    'for' => $id,
    'class' => 'form-label',
]) }}>
    {{ __("messages.label.{$label}") }}
</label>
