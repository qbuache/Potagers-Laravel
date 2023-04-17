@php
    $element = $jardin ?? null;
    $route = empty($element) ? route('jardins.store') : route('jardins.update', $element->slug);
@endphp
<x-app-layout>
    <x-page>
        <x-form.form
            :element="$element"
            :route="$route"
            :multipart="true"
        >
            <x-form.input
                name="name"
                autofocus
                required
            />
            <x-form.input
                name="file"
                type="file"
                label="image"
                help="Uploader une image au format JPEG"
                :required="empty($jardin)"
            />
            @if (!empty($jardin))
                <x-alert
                    class="my-2"
                    type="warning"
                >Attention modifier l'image d'un jardin risque de décaler l'emplacement de tous
                    ses potagers</x-alert>
            @endif
            <x-form.input
                name="coordinates"
                help="Sélectionnez l'emplacement du jardin en cliquant sur l'image ci-dessous"
                required
                readonly
            />
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
