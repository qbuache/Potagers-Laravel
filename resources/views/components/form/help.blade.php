@props(['name', 'help'])

@if ($help)
    <div {{ $attributes->merge(['id' => $name . 'Help']) }}
        class="form-text">
        {{ $help }}
    </div>
@endif
