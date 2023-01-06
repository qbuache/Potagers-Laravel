@props([
    'disabled' => false,
    'help' => null,
    'id' => null,
    'label' => null,
    'name',
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
    <textarea
        {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $help ? "aria-describedby={$name}Help" : '' }}
        {{ $attributes->class(['form-control'])->merge([
            'id' => $id ?? $name,
            'name' => $name,
        ]) }}
    >{{ old($name, $element[$name] ?? '') }}</textarea>
</x-form.field>
