@props([
    'disabled' => false,
    'help' => null,
    'id' => null,
    'label' => null,
    'items',
    'name',
    'required' => false,
    'use' => [0, 1],
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
    <select
        {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $help ? "aria-describedby={$name}Help" : '' }}
        {{ $attributes->class(['form-select'])->merge([
            'id' => $id ?? $name,
            'name' => $name,
        ]) }}
    >
        @foreach ($items as $item)
            <option value="{{ $item[$use[0]] }}">{{ $item[$use[1]] }}</option>
        @endforeach
    </select>
</x-form.field>
