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
        <div class="row">
            <div class="col-lg-6">
                @if ($jardins->isNotEmpty())
                    <div class="row card-line">
                        <div class="col-lg-4">
                            <x-card-line name="count_potagers">{{ $countPotagers }} potagers</x-card-line>
                        </div>
                        <div class="col-lg-4">
                            <x-card-line name="total_size">
                                <x-sqm>{{ $totalSize }}</x-sqm>
                            </x-card-line>
                        </div>
                        <div class="col-lg-4">
                            <x-card-line name="occupation">{{ $potagersOccupation }}%</x-card-line>
                        </div>
                    </div>
                    <x-jardins.potagers-sizes :sizes="$potagersSizes" />
                    <h5 class="text-custom card-line">Jardins</h5>
                    <div class="list-group card-line">
                        @foreach ($jardins as $jardin)
                            <a
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center jardin__hover"
                                data-name="{{ Str::slug($jardin->name, '_') }}"
                                href="{{ url("jardins/{$jardin->id}") }}"
                            >
                                <span>{{ $jardin->name }}</span>
                                <small class="text-muted">{{ $jardin->potagers->count() }} potagers</small>
                            </a>
                        @endforeach
                    </div>
                @else
                    <x-alert>Pas de jardins</x-alert>
                @endif
            </div>
            <div class="col-lg-6 mt-3 mt-lg-0">
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
        </div>
    </x-page>
    <x-jardins.template-jardin-pill />
    <script src="{{ asset('assets/js/jardins.app.js') }}"></script>
    <script>
        window.onload = () => Jardin({{ Js::from(['existingJardins' => $jardins, 'url' => url('jardins')]) }}).init()
    </script>
</x-app-layout>
