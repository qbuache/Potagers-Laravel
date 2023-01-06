@props(['fa' => 'save', 'supp' => null])

<div class="d-flex justify-content-between mt-3">
    {{ $supp }}
    <span></span>
    <x-button
        type="submit"
        :fa="$fa"
        color="outline-custom"
    >
        @if ($slot->isEmpty())
            Enregistrer
        @else
            {{ $slot }}
        @endif
    </x-button>
</div>
