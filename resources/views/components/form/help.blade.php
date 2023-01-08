@props(['name', 'help'])

@if ($help)
    <div
        class="form-text"
        {{ $attributes->merge(['id' => $name . 'Help']) }}
    >
        {{ $help }}
    </div>
@endif
