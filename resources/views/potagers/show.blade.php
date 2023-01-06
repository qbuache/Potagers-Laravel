<x-app-layout>
    <x-page>
        <x-btn-group>
            @can(Permissions::DELETE_POTAGERS)
                <x-button
                    class="btn__action"
                    data-bs-target="#modalConfirm"
                    data-bs-toggle="modal"
                    fa="trash"
                >Supprimer</x-button>
            @endcan
            @can(Permissions::EDIT_POTAGERS)
                <x-link
                    href="potagers/{{ $potager->id }}/edit"
                    fa="pencil-alt"
                >Modifier</x-link>
            @endcan
        </x-btn-group>
        <div class="row card-line">
            <div class="col-lg-4">
                <x-card-line name="jardin">
                    <a href="{{ url("jardins/{$potager->jardin->id}") }}">{{ $potager->jardin->name }}</a>
                </x-card-line>
            </div>
            <div class="col-lg-4">
                <x-card-line name="size">{{ $potager->size }}m<sup>2</sup></x-card-line>
            </div>
        </div>
        <div class="row card-line">
            <div class="col-lg-6">
                <div
                    class="position-relative"
                    id="imageWrapper"
                >
                    <img
                        class="rounded"
                        id="image"
                        src="{{ asset("assets/img/pota{$potager->jardin->id}.jpeg") }}"
                        alt="Jardin {{ $potager->jardin->name }}"
                        style="max-width:100%"
                    >
                </div>
            </div>
        </div>
    </x-page>
    <x-modal-confirm
        action='{{ "potagers/$potager->id" }}'
        method="DELETE"
    >
        Voulez-vous vraiment supprimer ce potager ?
    </x-modal-confirm>
    <x-potagers.template-potager-pill />
    <script src="{{ url('js/potagers.app.js') }}"></script>
    <script>
        window.onload = () => Potager({{ Js::from(['existingPotagers' => [$potager]]) }}).init()
    </script>
</x-app-layout>
