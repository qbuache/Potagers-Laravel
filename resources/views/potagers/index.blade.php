<x-app-layout>
    <x-page>
        <input
            class="form-control"
            id="searchBox"
            type="search"
            placeholder="Rechercher..."
        >
        <div
            class="rounded p-0 mt-3"
            id="potagers"
        >
            <div class="list-group list-group-flush border border-bottom-0 overflow-hidden rounded">
                @forelse($potagers as $potager)
                    <a
                        class="list-group-item list-group-item-action border-bottom"
                        href="{{ url("potagers/{$potager->id}") }}"
                    >
                        <div class="row">
                            <div class="col-lg-3">{{ $potager->name }}</div>
                            <small class="col-lg-3 text-lg-center text-muted">
                                <x-sqm>{{ $potager->size }}</x-sqm>
                            </small>
                            <small
                                class="col-lg-3 text-lg-center text-muted">{{ !empty($potager->jardinier) ? 'Attribué' : 'Libre' }}</small>
                            <small class="col-lg-3 text-lg-end text-muted">{{ $potager->jardin->name }}</small>
                        </div>
                    </a>
                @empty
                    <x-alert>Il n'y a pas de potager</x-alert>
                @endforelse
            </div>
        </div>
        <x-alert
            class="mt-3"
            id="noResult"
            style="display:none"
        >Pas de résultat</x-alert>
    </x-page>
</x-app-layout>
<script src="{{ asset('assets/js/potagers.index.js') }}"></script>
