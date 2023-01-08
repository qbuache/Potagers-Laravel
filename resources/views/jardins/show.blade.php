<x-app-layout>
    <x-page>
        @if ($jardin->description)
            <x-slot name="pageSubText">
                <span class="text-muted">
                    {{ $jardin->description }}
                </span>
            </x-slot>
        @endif
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
                    href="jardins/{{ $jardin->id }}/edit"
                    fa="pencil-alt"
                >Modifier</x-link>
                <x-link
                    href="jardins/{{ $jardin->id }}/define-potagers"
                    fa="bullseye"
                >Définir les potagers</x-link>
            @endcan
        </x-btn-group>
        <div class="row card-line">
            <div class="col-lg-3">
                <x-card-line name="count_potagers">{{ $jardin->potagers->count() }} potagers</x-card-line>
            </div>
            <div class="col-lg-3">
                <x-card-line name="total_size">{{ $jardin->potagers->sum('size') }}m<sup>2</sup></x-card-line>
            </div>
        </div>
        <div class="row card-line">
            <div class="col-lg-6">
                <div class="list-group">
                    @forelse ($jardin->potagers as $potager)
                        <a
                            class="list-group-item list-group-item-action potager__hover"
                            data-name="{{ $potager->name }}"
                            href="{{ url("potagers/{$potager->id}") }}"
                        >
                            <div class="d-flex justify-content-between align-items-center">
                                <span>{{ $potager->name }}</span>
                                <small class="text-muted">{{ $potager->size }}m<sup>2</sup></small>
                            </div>
                        </a>
                    @empty
                        <x-alert>Pas de potagers</x-alert>
                    @endforelse
                </div>
            </div>
            <div class="col-lg-6 mt-3 mt-lg-0">
                <div
                    class="sticky"
                    id="imageWrapper"
                >
                    <img
                        class="rounded"
                        id="image"
                        src="{{ asset("assets/img/pota{$jardin->id}.jpeg") }}"
                        alt="Jardin {{ $jardin->name }}"
                        style="max-width:100%"
                    >
                </div>
            </div>
        </div>
    </x-page>
    <x-modal-confirm
        action='{{ "jardins/$jardin->id" }}'
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
