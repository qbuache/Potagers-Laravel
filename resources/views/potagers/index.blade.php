<x-app-layout>
    <div class="col-lg-8 mx-auto">
        <x-page>
            <div class="list-group">
                @forelse($potagers as $potager)
                    <a
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                        href="{{ url("potagers/{$potager->id}") }}"
                    >
                        <span>{{ $potager->name }}</span>
                        <small class="text-muted">{{ $potager->jardin->name }}</small>
                    </a>
                @empty
                    <x-alert>Il n'y a pas de potager</x-alert>
                @endforelse
            </div>
        </x-page>
    </div>
</x-app-layout>
