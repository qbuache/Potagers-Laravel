@props(['type' => 'button', 'color' => 'light', 'fa' => '', 'size' => 'sm'])

<button {{ $attributes->class(['btn'])->merge([
    'class' => "btn-{$color} btn-{$size}",
    'type' => $type,
]) }}>
    <x-fa-span :fa="$fa">{{ $slot }}</x-fa-span>
</button>
