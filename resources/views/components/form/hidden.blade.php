@props([
    'id' => null,
    'name',
])

@aware(['element' => null])

<input
    type="hidden"
    {{ $attributes->merge([
        'id' => $id ?? $name,
        'name' => $name,
        'value' => old($name, $element[$name] ?? ''),
    ]) }}
/>
