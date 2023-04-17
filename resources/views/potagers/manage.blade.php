@php
    $element = $potager ?? null;
    $route = empty($element) ? route('potagers.store') : route('potagers.update', $element->id);
@endphp
<x-app-layout>
    <x-page>
        <x-form.form
            :element="$element"
            :route="$route"
        >
            <x-form.input
                name="name"
                autofocus
                help="Bla bla bla"
                required
            />
            <x-form.input
                name="size"
                type="number"
                label="size_square"
                required
            />
            <x-form.select
                name="state"
                required
                :items="$states"
            />
            <input
                id="coordinates"
                name="coordinates"
                type="hidden"
                value="{{ json_encode($potager->coordinates) }}"
            >
            <div class="mt-3">
                <x-button
                    class="btn bgn-sm btn-light w-100 text-start"
                    class="dropdown-toggle"
                    data-bs-target="#collapseCoordinates"
                    data-bs-toggle="collapse"
                    aria-controls="collapseCoordinates"
                    aria-expanded="false"
                    fa="bullseye"
                >Modifier l'emplacement du potager</x-button>
                <div
                    class="collapse"
                    id="collapseCoordinates"
                >
                    <x-alert class="mt-3 ">Sélectionnez l'emplacement du potager</x-alert>
                    <div class="d-flex justify-content-center mt-3">
                        <div
                            class="position-relative overflow-auto h-100"
                            id="imageWrapper"
                        >
                            <img
                                class="rounded"
                                id="image"
                                src="{{ asset("storage/potagers/{$potager->jardin->slug}.jpeg") }}"
                                alt="Jardin {{ $potager->jardin->name }}"
                                style="cursor: crosshair"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <x-form.submit />
        </x-form.form>
    </x-page>
    <x-potagers.template-potager-pill />
    <script src="{{ asset('assets/js/potagers.app.js') }}"></script>
    <script>
        window.onload = () => Potager(
            {{ Js::from([
                'existingPotagers' => [$potager],
                'editing' => true,
                'showAttribution' => false,
                'showState' => false,
            ]) }}
        ).init()
    </script>
</x-app-layout>
