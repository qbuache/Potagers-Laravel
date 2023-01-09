@php
    $element = $jardin ?? null;
    $route = empty($element) ? route('jardins.store') : route('jardins.update', $element->id);
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
                required
            />
            <x-form.textarea name="description" />
            <x-form.hidden name="coordinates" />
            <x-alert class="mt-3 ">Sélectionnez l'emplacement du jardin</x-alert>
            <div class="d-flex justify-content-center mt-3">
                <div
                    class="position-relative overflow-auto h-100"
                    id="imageWrapper"
                >
                    <img
                        class="rounded"
                        id="image"
                        src="{{ asset('assets/img/quartier.jpeg') }}"
                        alt="Quartier"
                        style="cursor: crosshair"
                    />
                </div>
            </div>
            <x-form.submit />
        </x-form.form>
    </x-page>
    <x-jardins.template-jardin-pill />
    <script src="{{ asset('assets/js/jardins.app.js') }}"></script>
    <script>
        window.onload = () => Jardin({{ Js::from(['existingJardins' => $jardins, 'creating' => true]) }}).init()
    </script>
</x-app-layout>
