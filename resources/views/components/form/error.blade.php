@props(['name'])

@error($name)
    <div
        class="text-danger form-text"
        {{ $attributes->merge(['id' => $name . 'Error']) }}
    >
        {{ $message }}
    </div>
@enderror
