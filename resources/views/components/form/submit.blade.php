@props(['fa' => 'save', 'supp' => null])

<div class="d-flex justify-content-between mt-3">
    @if (empty($supp))
        <span></span>
    @else
        {{ $supp }}
    @endif
    <x-button
        class="mt-auto"
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
