@props(['required' => false, 'noHeader' => false])

<div class="card card-body shadow-sm">
    <x-page-header :required="$required"
        :noHeader="$noHeader" />
    {{ $slot }}
</div>
