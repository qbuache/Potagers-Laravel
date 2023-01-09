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
        <div class="row">
            <div class="col-lg-6">
                @if ($jardin->potagers->isNotEmpty())
                    <div class="row card-line">
                        <div class="col-lg-6">
                            <x-card-line name="count_potagers">{{ $jardin->potagers->count() }} potagers</x-card-line>
                        </div>
                        <div class="col-lg-6">
                            <x-card-line name="total_size">
                                <x-sqm>{{ $jardin->potagers->sum('size') }}</x-sqm>
                            </x-card-line>
                        </div>
                    </div>
                    <x-card-line name="spread">
                        <table class="table table-sm table-round table-boxed table-bordered">
                            <tbody>
                                <tr>
                                    @foreach ($sizes as $size => $count)
                                        <td>
                                            <x-sqm>{{ $count }}x{{ $size }}</x-sqm>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </x-card-line>
                    <div class="list-group card-line">
                        @foreach ($jardin->potagers as $potager)
                            <a
                                class="list-group-item list-group-item-action potager__hover"
                                data-name="{{ $potager->name }}"
                                href="{{ url("potagers/{$potager->id}") }}"
                            >
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>{{ $potager->name }}</span>
                                    <small class="text-muted">
                                        <x-sqm>{{ $potager->size }}</x-sqm>
                                    </small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <x-alert>Pas de potager</x-alert>
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
