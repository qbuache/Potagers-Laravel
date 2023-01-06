@props(['name'])

@error($name)
    <div {{ $attributes->merge(['id' => $name . 'Error']) }}
        class="text-danger form-text">
        {{ $message }}
    </div>
@enderror
