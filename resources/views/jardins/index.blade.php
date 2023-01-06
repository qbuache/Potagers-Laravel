<x-app-layout>
    <x-page>
        <x-btn-group>
            @can(Permissions::CREATE_JARDINS)
                <x-link
                    href="jardins/create"
                    fa="plus"
                >Créer un jardin</x-link>
            @endcan
        </x-btn-group>
        <x-card-line name="total_size">{{ $totalSize }}m<sup>2</sup></x-card-line>
        <div class="row card-line">
            <div class="col-lg-6">
                <div
                    class="sticky"
                    id="imageWrapper"
                >
                    <img
                        class="rounded"
                        id="image"
                        src="{{ asset('assets/img/quartier.jpeg') }}"
                        alt="Quartier"
                        style="max-width:100%"
                    >
                </div>
            </div>
            <div class="col-lg-6 mt-3 mt-lg-0">
                <h5 class="text-custom">Jardins</h5>
                <div class="list-group">
                    @foreach ($jardins as $jardin)
                        <a
                            class="list-group-item list-group-item-action jardin__hover"
                            data-name="{{ str_replace(' ', '_', $jardin->name) }}"
                            href="{{ url("jardins/{$jardin->id}") }}"
                        >
                            {{ $jardin->name }}
                        </a>
                    @endforeach
                </div>
            </div>
    </x-page>
    <x-jardins.template-jardin-pill />
    <script src="{{ url('js/jardins.app.js') }}"></script>
    <script>
        window.onload = () => Jardin({{ Js::from(['existingJardins' => $jardins, 'url' => url('jardins')]) }}).init()
    </script>
</x-app-layout>
