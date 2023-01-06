@props(['required' => false, 'noHeader' => false])

@if (!$noHeader)
    @php
        $breadcrumb =
            request()
                ->route()
                ->breadcrumbs()
                ->toCollection()
                ->last()->title ?? '500';
    @endphp
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="m-0">
            <span title="{{ $breadcrumb }}">
                {{ $breadcrumb }}
            </span>
            <x-slot name="suppText"></x-slot>
        </h4>
        <div class="d-flex align-items-center">
            <x-slot name="topRight"></x-slot>
            @if ($required)
                <div class="ms-2">
                    <span class="text-custom">*</span>
                    <span class="text-muted">requis</span>
                </div>
            @endif
        </div>
    </div>
@endif
