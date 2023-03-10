@props(['fa' => '', 'fw' => true])

<div class="fa-span d-inline-flex align-items-center gap-1">
    @if ($fa)
        <i {{ $attributes->class(['fa', 'fa-fw' => $fw])->merge([
            'class' => "fa-{$fa}",
        ]) }}>
        </i>
    @endif
    <span>{{ $slot }}</span>
</div>
