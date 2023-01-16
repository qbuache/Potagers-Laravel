<x-app-layout>
    <div class="row">
        <div class="col-lg-3">
            <x-page
                class="sticky"
                noHeader
            >
                <input
                    class="form-control"
                    id="searchBox"
                    type="search"
                    placeholder="Rechercher..."
                />
                <ul class="mt-3 mb-0 list-unstyled">
                    <li>
                        <x-form.simple.radio
                            class="size"
                            id="sizeAll"
                            name="size"
                            value=""
                            :checked="true"
                            noMb
                        >Tous</x-form.simple.radio>
                    </li>
                    @foreach ($sizes as $size => $count)
                        <li>
                            <x-form.simple.radio
                                class="size"
                                id="size{{ $size }}"
                                name="size"
                                value="{{ $size }}"
                                noMb
                            >
                                <x-sqm>{{ $size }}</x-sqm>
                            </x-form.simple.radio>
                        </li>
                    @endforeach
                </ul>
            </x-page>
        </div>
        <div class="col-lg-9">
            <x-page>
                <div
                    class="rounded p-0"
                    id="potagers"
                >
                    <div class="list-group list-group-flush border border-bottom-0 overflow-hidden rounded">
                        @forelse($potagers as $potager)
                            <a
                                class="potager list-group-item list-group-item-action border-bottom"
                                data-size="{{ $potager->size }}"
                                href="{{ url("potagers/{$potager->id}") }}"
                            >
                                <div class="row">
                                    <div class="col-lg-3">{{ $potager->name }}</div>
                                    <small class="col-lg-2 text-lg-center text-muted">
                                        <x-sqm>{{ $potager->size }}</x-sqm>
                                    </small>
                                    <small
                                        class="col-lg-2 text-lg-center {{ $potager->state != 'ok' ? 'text-warning' : 'text-muted' }}"
                                    >
                                        {{ $potager->state_text }}
                                    </small>
                                    <small class="col-lg-2 text-lg-center text-muted">
                                        {{ !empty($potager->jardinier) ? 'Attribué' : 'Libre' }}
                                    </small>
                                    <small class="col-lg-3 text-lg-end text-muted">{{ $potager->jardin->name }}</small>
                                </div>
                            </a>
                        @empty
                            <x-alert>Il n'y a pas de potager</x-alert>
                        @endforelse
                    </div>
                </div>
                <x-alert
                    id="noResult"
                    style="display:none"
                >Pas de résultat</x-alert>
            </x-page>
        </div>
    </div>
</x-app-layout>
<script
    src="{{ asset('assets/js/potagers.index.js') }}"
    defer
></script>
