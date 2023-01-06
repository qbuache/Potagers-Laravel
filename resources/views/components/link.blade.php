@props(['href', 'color' => 'light', 'fa' => '', 'size' => 'sm'])

<a {{ $attributes->class(['btn'])->merge([
    'class' => "btn-{$color} btn-{$size}",
]) }}
    href="{{ url($href) }}">
    <x-fa-span :fa="$fa">{{ $slot }}</x-fa-span>
</a>
