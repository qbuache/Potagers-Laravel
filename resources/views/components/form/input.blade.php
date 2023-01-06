@props([
    'disabled' => false,
    'help' => null,
    'id' => null,
    'label' => null,
    'name',
    'type' => 'text',
    'required' => false,
])

@aware(['element' => null])

<x-form.field
    class="form-field"
    :help="$help"
    :id="$id ?? $name"
    :label="$label ?? $name"
    :required="$required"
    :name="$name"
>
    <input
        {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $help ? "aria-describedby={$name}Help" : '' }}
        {{ $attributes->class(['form-control'])->merge([
            'id' => $id ?? $name,
            'name' => $name,
            'type' => $type,
            'value' => old($name, $element[$name] ?? ''),
        ]) }}
    />
</x-form.field>
