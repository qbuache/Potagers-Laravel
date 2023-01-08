<x-app-layout>
    <div class="col-lg-10 mx-auto">
        <x-page>
            <x-form.form
                :element="$potager ?? null"
                route="potagers"
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
                    required
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
                                    src="{{ asset("assets/img/pota{$potager->jardin->id}.jpeg") }}"
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
    </div>
    <x-potagers.template-potager-pill />
    <script src="{{ asset('assets/js/potagers.app.js') }}"></script>
    <script>
        window.onload = () => Potager({{ Js::from(['existingPotagers' => [$potager], 'editing' => true]) }}).init()
    </script>
</x-app-layout>
