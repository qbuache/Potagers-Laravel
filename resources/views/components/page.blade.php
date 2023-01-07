@props(['required' => false, 'noHeader' => false, 'pageSuppText' => null, 'pageSubText' => null, 'pageTopRight' => null])

<div class="card card-body shadow-sm">
    <x-page-header
        :required="$required"
        :pageSsubText="$pageSuppText"
        :pageSubText="$pageSubText"
        :pageTopRight="$pageTopRight"
    >
    </x-page-header>
    {{ $slot }}
</div>
