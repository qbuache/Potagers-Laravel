@props([
    'checked' => false,
    'disabled' => false,
    'help' => null,
    'id' => null,
    'name',
    'noMb' => false,
    'required' => false,
])

<div @class(['form-check', 'mb-0' => $noMb])>
    <input
        type="radio"
        {{ $checked ? 'checked' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $help ? "aria-describedby={$name}Help" : '' }}
        {{ $attributes->class(['form-check-input'])->merge([
            'id' => $id ?? $name,
            'name' => $name,
            'value' => old($name, $element[$name] ?? ''),
        ]) }}
    />
    @if (!empty($slot))
        <label
            class="form-check-label"
            for="{{ $id ?? $name }}"
        >{{ $slot }}</label>
    @endif
</div>
