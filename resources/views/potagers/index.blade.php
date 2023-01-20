<x-app-layout>
    <div class="row">
        <div class="col-lg-3">
            <x-page
                class="sticky"
                noHeader
            >
                <div class="d-grid gap-3">
                    <input
                        class="form-control"
                        id="searchBox"
                        type="search"
                        placeholder="Rechercher..."
                    />
                    <x-potagers.radio-search
                        name="jardin"
                        useValue="id"
                        useText="name"
                        :elements="$jardins"
                    />
                    <x-potagers.radio-search
                        name="size"
                        all="Toutes"
                        dynamicComponent="sqm"
                        :elements="$sizes"
                    />
                    <x-potagers.radio-search
                        name="state"
                        :elements="$states"
                        translate="state_"
                    />
                    <x-potagers.radio-search
                        name="status"
                        :elements="$statuses"
                        translate="status_"
                    />
                </div>
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
                                data-jardin="{{ $potager->jardin['id'] }}"
                                data-size="{{ $potager->size }}"
                                data-state="{{ $potager->state }}"
                                data-status="{{ !empty($potager->user_id) ? 'attributed' : 'open' }}"
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
                                        {{ $potager->is_attributed ? __('messages.label.status_attributed') : __('messages.label.status_open') }}
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
