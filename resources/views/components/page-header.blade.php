@props(['required' => false, 'noHeader' => false, 'title' => null, 'pageSuppText' => null, 'pageSubText' => null, 'pageTopRight' => null])

@if (!$noHeader)
    @php
        $title ??=
            request()
                ->route()
                ->breadcrumbs()
                ->toCollection()
                ->last()->title ?? '500';
    @endphp
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold text-custom m-0">
                <span title="{{ $title }}">
                    {{ $title }}
                </span>
                {{ $pageSuppText }}
            </h4>
            {{ $pageSubText }}
        </div>
        <div class="d-flex align-items-center">
            {{ $pageTopRight }}
            @if ($required)
                <div class="ms-2">
                    <span class="text-custom">*</span>
                    <span class="text-muted">requis</span>
                </div>
            @endif
        </div>
    </div>
@endif
