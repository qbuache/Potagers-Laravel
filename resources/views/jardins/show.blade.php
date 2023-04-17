<x-app-layout>
    <x-page>
        <x-btn-group>
            @can(Permissions::DELETE_JARDINS)
                <x-button
                    class="btn__action"
                    data-bs-target="#modalConfirm"
                    data-bs-toggle="modal"
                    fa="trash"
                >Supprimer</x-button>
            @endcan
            @can(Permissions::EDIT_JARDINS)
                <x-link
                    href="jardins/{{ $jardin->slug }}/edit"
                    fa="pencil-alt"
                >Modifier</x-link>
                <x-link
                    href="jardins/{{ $jardin->slug }}/define-potagers"
                    fa="bullseye"
                >Définir les potagers</x-link>
            @endcan
        </x-btn-group>
        <div class="row">
            <div class="col-lg-6">
                @if ($jardin->potagers->isNotEmpty())
                    <div class="row card-line">
                        <div class="col-lg-4">
                            <x-card-line name="count_potagers">{{ $jardin->potagers->count() }} potagers</x-card-line>
                        </div>
                        <div class="col-lg-4">
                            <x-card-line name="total_size">
                                <x-sqm>{{ $jardin->potagers->sum('size') }}</x-sqm>
                            </x-card-line>
                        </div>
                        <div class="col-lg-4">
                            <x-card-line name="occupation">{{ $jardin->occupation() }}%</x-card-line>
                        </div>
                    </div>
                    <x-jardins.potagers-sizes :sizes="$jardin->sizes()" />
                    <h5 class="text-custom card-line">Potagers</h5>
                    <div class="list-group card-line">
                        @foreach ($jardin->potagers as $potager)
                            <a
                                class="list-group-item list-group-item-action potager__hover"
                                data-name="{{ $potager->name }}"
                                href="{{ url("potagers/{$potager->id}") }}"
                            >
                                <div class="row">
                                    <span class="col-lg-3">{{ $potager->name }}</span>
                                    <small class="col-lg-3 text-muted text-lg-center">
                                        <x-sqm>{{ $potager->size }}</x-sqm>
                                    </small>
                                    <small class="col-lg-3 text-muted text-lg-center">
                                        <span @class(['text-warning' => $potager->state != 'ok'])>{{ $potager->state_text }}</span>
                                    </small>
                                    <small class="col-lg-3 text-muted text-lg-end">
                                        {{ $potager->is_attributed ? 'Attribué' : 'Libre' }}
                                    </small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <x-alert>Pas de potager</x-alert>
                @endif
            </div>
            <div class="col-lg-6 mt-3 mt-lg-0 d-flex justify-content-center">
                <div
                    class="sticky"
                    id="imageWrapper"
                >
                    <img
                        class="rounded"
                        id="image"
                        src="{{ asset("storage/potagers/{$jardin->slug}.jpeg") }}"
                        alt="Jardin {{ $jardin->name }}"
                        style="max-width:100%"
                    >
                </div>
            </div>
        </div>
    </x-page>
    <x-modal-confirm
        action='{{ "jardins/$jardin->slug" }}'
        method="DELETE"
    >
        Voulez-vous vraiment supprimer ce jardin ?
    </x-modal-confirm>
    <x-potagers.template-potager-pill />
    <script src="{{ asset('assets/js/potagers.app.js') }}"></script>
    <script>
        window.onload = () => Potager(
            {{ Js::from(['existingPotagers' => $jardin->potagers, 'url' => url('potagers')]) }}
        ).init()
    </script>
</x-app-layout>
