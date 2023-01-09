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
            @can(Permissions::GIVE_POTAGERS)
                <x-link
                    href="potagers/{{ $potager->id }}/jardinier"
                    fa="user"
                >Jardinier</x-link>
            @endcan
        </x-btn-group>

        <div class="row card-line">
            <div class="col-lg-6">
                <div class="row card-line">
                    <div class="col-lg-6">
                        <x-card-line name="size">
                            <x-sqm>{{ $potager->size }}</x-sqm>
                        </x-card-line>
                    </div>
                    <div class="col-lg-6">
                        <x-card-line name="jardin">
                            <a href="{{ url("jardins/{$potager->jardin->id}") }}">{{ $potager->jardin->name }}</a>
                        </x-card-line>
                    </div>
                </div>
                <x-card-line name="state">{{ $potager->state_text }}</x-card-line>
                @if (!empty($potager->jardinier))
                    <div class="row card-line">
                        <div class="col-lg-6">
                            <x-card-line name="jardinier">
                                <a
                                    href="{{ url("users/{$potager->jardinier->id}") }}">{{ $potager->jardinier->name }}</a>
                            </x-card-line>
                        </div>
                        <div class="col-lg-6">
                            <x-card-line name="attributed_by">{{ $potager->attributed_by->name }} le
                                {{ $potager->attributed_at->format('d.m.Y') }}</x-card-line>
                        </div>
                    </div>
                @else
                    <x-alert class="my-3">Ce potager n'est pas attibué</x-alert>
                @endif
            </div>
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
    <script src="{{ asset('assets/js/potagers.app.js') }}"></script>
    <script>
        window.onload = () => Potager({{ Js::from(['existingPotagers' => [$potager]]) }}).init()
    </script>
</x-app-layout>
