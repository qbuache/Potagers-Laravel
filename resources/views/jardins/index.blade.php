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
                <x-card-line name="total_size">
                    <x-sqm>{{ $totalSize }}</x-sqm>
                </x-card-line>
                <x-card-line name="spread">
                    <table class="table table-sm table-round table-boxed table-bordered">
                        <tbody>
                            <tr>
                                @foreach ($sizes as $size)
                                    <td>
                                        <x-sqm>{{ $size->count }}x{{ $size->size }}</x-sqm>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </x-card-line>
                <div class="list-group card-line">
                    @forelse($jardins as $jardin)
                        <a
                            class="list-group-item list-group-item-action jardin__hover"
                            data-name="{{ Str::slug($jardin->name, '_') }}"
                            href="{{ url("jardins/{$jardin->id}") }}"
                        >
                            {{ $jardin->name }}
                        </a>
                    @empty
                        <x-alert>Pas de jardins</x-alert>
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
