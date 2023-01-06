@props([
    'chkLabel' => null,
    'checked' => false,
    'disabled' => false,
    'help' => null,
    'id' => null,
    'name',
    'required' => false,
    'switch' => false,
])

<div @class(['form-check', 'form-switch' => $switch])>
    <input
        type="checkbox"
        {{ $checked ? 'checked' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $help ? "aria-describedby={$name}Help" : '' }}
        {{ $attributes->class(['form-check-input'])->merge([
            'id' => $id,
            'name' => $name,
            'value' => old($name, $element[$name] ?? ''),
        ]) }}
    />
    @if ($chkLabel)
        <label
            class="form-check-label"
            for="{{ $id ?? $name }}"
        >{{ $chkLabel }}</label>
    @endif
</div>
