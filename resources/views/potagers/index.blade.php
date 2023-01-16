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
                    <div>
                        <h6 class="text-custom">{{ __('messages.label.jardin_id') }}</h6>
                        <ul class="mb-0 list-unstyled">
                            <li>
                                <x-form.simple.radio
                                    class="jardin"
                                    id="jardinAll"
                                    name="jardin"
                                    value=""
                                    :checked="true"
                                    noMb
                                >Tous</x-form.simple.radio>
                            </li>
                            @foreach ($jardins as $jardin)
                                <li>
                                    <x-form.simple.radio
                                        class="jardin"
                                        id="jardin{{ $jardin['id'] }}"
                                        name="jardin"
                                        value="{{ $jardin['id'] }}"
                                        noMb
                                    >{{ $jardin['name'] }}</x-form.simple.radio>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h6 class="text-custom">{{ __('messages.label.size') }}</h6>
                        <ul class="mb-0 list-unstyled">
                            <li>
                                <x-form.simple.radio
                                    class="size"
                                    id="sizeAll"
                                    name="size"
                                    value=""
                                    :checked="true"
                                    noMb
                                >Toutes</x-form.simple.radio>
                            </li>
                            @foreach ($sizes as $size)
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
                    </div>
                    <div>
                        <h6 class="text-custom">{{ __('messages.label.state') }}</h6>
                        <ul class="mb-0 list-unstyled">
                            <li>
                                <x-form.simple.radio
                                    class="state"
                                    id="stateAll"
                                    name="state"
                                    value=""
                                    :checked="true"
                                    noMb
                                >Tous</x-form.simple.radio>
                            </li>
                            @foreach ($states as $state)
                                <li>
                                    <x-form.simple.radio
                                        class="state"
                                        id="state{{ $state }}"
                                        name="state"
                                        value="{{ $state }}"
                                        noMb
                                    >{{ __("messages.label.state_{$state}") }}</x-form.simple.radio>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h6 class="text-custom">{{ __('messages.label.status') }}</h6>
                        <ul class="mb-0 list-unstyled">
                            <li>
                                <x-form.simple.radio
                                    class="status"
                                    id="statusAll"
                                    name="status"
                                    value=""
                                    :checked="true"
                                    noMb
                                >Tous</x-form.simple.radio>
                            </li>
                            @foreach ($statuses as $status)
                                <li>
                                    <x-form.simple.radio
                                        class="status"
                                        id="status{{ $status }}"
                                        name="status"
                                        value="{{ $status }}"
                                        noMb
                                    >{{ __("messages.label.statuses_{$status}") }}</x-form.simple.radio>
                                </li>
                            @endforeach
                        </ul>
                    </div>
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
                                        {{ !empty($potager->jardinier) ? __('messages.label.status_attributed') : __('messages.label.status_open') }}
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
