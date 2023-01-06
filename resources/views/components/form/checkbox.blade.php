@props([
    'chkLabel' => null,
    'disabled' => false,
    'help' => null,
    'id' => null,
    'label' => null,
    'name',
    'required' => false,
    'switch' => false,
])

@aware(['element' => null])

<x-form.field
    class="form-field"
    :help="$help"
    :id="$id ?? $name"
    :label="$label ?? $name"
    :name="$name"
    :required="$required"
>
    <x-form.simple.checkbox
        :chkLabel="$chkLabel"
        :disabled="$disabled"
        :help="$help"
        :id="$id"
        :name="$name"
        :required="$required"
        :switch="$switch"
        {{-- checked="{{ $element[$name] ?? '' }}" --}}
    />
</x-form.field>
