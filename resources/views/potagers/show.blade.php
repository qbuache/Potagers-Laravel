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
        <div class="row">
            <div class="col-lg-6">
                <div class="row card-line">
                    <div class="col-lg-4">
                        <x-card-line name="size">
                            <x-sqm>{{ $potager->size }}</x-sqm>
                        </x-card-line>
                    </div>
                    <div class="col-lg-4">
                        <x-card-line name="state">
                            <span @class(['text-warning' => $potager->state != 'ok'])>{{ $potager->state_text }}</span>
                        </x-card-line>
                    </div>
                    <div class="col-lg-4">
                        <x-card-line name="jardin">
                            <a href="{{ url("jardins/{$potager->jardin->slug}") }}">{{ $potager->jardin->name }}</a>
                        </x-card-line>
                    </div>
                </div>
                @if ($potager->is_attributed)
                    @can(Permissions::READ_USERS)
                        <h5 class="text-custom card-line">Attribution</h5>
                        <div class="row card-line">
                            <div class="col-lg-4">
                                <x-card-line name="jardinier">
                                    <a
                                        href="{{ url("users/{$potager->jardinier->id}") }}">{{ $potager->jardinier->name }}</a>
                                </x-card-line>
                            </div>
                            <div class="col-lg-4">
                                <x-card-line name="attributed_by">{{ $potager->attributed_by->name }} le
                                    {{ $potager->attributed_at->format('d.m.Y') }}</x-card-line>
                            </div>
                        </div>
                    @endcan
                @else
                    <x-alert class="my-3">Ce potager n'est pas attibué</x-alert>
                @endif
            </div>
            <div class="col-lg-6 mt-3 mt-lg-0 d-flex justify-content-center">
                <div
                    class="position-relative"
                    id="imageWrapper"
                >
                    <img
                        class="rounded"
                        id="image"
                        src="{{ asset("storage/potagers/{$potager->jardin->slug}.jpeg") }}"
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
