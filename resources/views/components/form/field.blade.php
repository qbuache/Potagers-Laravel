@props(['help' => null, 'id', 'label', 'name', 'required'])

<div {{ $attributes->merge([
    'class' => $required ? 'required' : '',
]) }}>
    <x-form.label
        :id="$id ?? $name"
        :label="$label ?? $name"
    />
    {{ $slot }}
    <x-form.error :name="$name" />
    <x-form.help
        :name="$name"
        :help="$help"
    />
</div>
