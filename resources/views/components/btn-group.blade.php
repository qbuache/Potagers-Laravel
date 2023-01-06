@props(['mb' => 'mb-3'])

@if (!empty(trim($slot)))
    <div {{ $attributes->class(['btn-toolbar'])->merge([
        'class' => $mb,
    ]) }}>
        <div class="btn-group flex-wrap">
            {{ $slot }}
        </div>
    </div>
@endif
