@props(['type' => 'info', 'size' => 'sm'])

<div
    role="alert"
    {{ $attributes->class(['alert p-2 m-0'])->merge([
        'class' => "alert-{$type}",
    ]) }}
>
    {{ $slot }}
</div>
