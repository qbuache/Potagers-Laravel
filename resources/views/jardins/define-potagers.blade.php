<x-app-layout>
    <x-page>
        <x-alert class="mb-3 ">Sélectionnez l'emplacement des potagers</x-alert>
        <form
            action="{{ url("jardins/{$jardin->id}/define-potagers") }}"
            method="POST"
        >
            @csrf
            <div class="d-flex justify-content-between">
                <div
                    class="sticky h-100"
                    id="imageWrapper"
                >
                    <img
                        class="rounded "
                        id="image"
                        src="{{ asset("assets/img/pota{$jardin->id}.jpeg") }}"
                        alt="Jardin {{ $jardin->name }}"
                        style="cursor: crosshair"
                    >
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="text-custom">Nouveaux potagers</h5>
                    <div class="mb-3">
                        <label
                            class="form-label text-muted"
                            for="nextPotager"
                        >Prochain n° de potager</label>
                        <input
                            class="form-control form-control-sm"
                            id="nextPotager"
                            type="number"
                            value="{{ $nextPotager }}"
                        >
                    </div>
                    <div
                        class="list-group"
                        id="potagersList"
                    >
                    </div>
                </div>
            </div>
            <x-form.submit />
        </form>
    </x-page>
    <x-potagers.template-potager-pill />
    <x-potagers.template-potager-line />
    <script src="{{ asset('assets/js/potagers.app.js') }}"></script>
    <script>
        window.onload = () => Potager(
            {{ Js::from(['existingPotagers' => $jardin->potagers, 'creating' => true, 'increment' => true]) }}
        ).init()
    </script>
</x-app-layout>
