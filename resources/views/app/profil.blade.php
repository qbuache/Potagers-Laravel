<x-app-layout>
    <x-page>
        <x-card-line name="name">{{ $user->name }}</x-card-line>
        <x-card-line name="email">{{ $user->email }}</x-card-line>
        <x-card-line name="roles">
            <ul class="mb-0">
                @foreach ($user->roles as $role)
                    <li>{{ __("messages.label.{$role->name}") }}</li>
                @endforeach
            </ul>
        </x-card-line>
        <div class="card-line">
            <h5 class="text-custom">Potagers</h5>
            <div class="list-group">
                @forelse ($user->potagers as $potager)
                    <a
                        class="list-group-item list-group-item-action"
                        href="{{ url("potagers/{$potager->id}") }}"
                    >
                        <div class="row">
                            <span class="col-lg-4">{{ $potager->name }}</span>
                            <small class="col-lg-4 text-lg-center text-muted">
                                <x-sqm>{{ $potager->size }}</x-sqm>
                            </small>
                            <small class="col-lg-4 text-lg-end text-muted">{{ $potager->jardin->name }}</small>
                        </div>
                    </a>
                @empty
                    <x-alert>Pas de potager</x-alert>
                @endforelse
            </div>
        </div>
    </x-page>
</x-app-layout>
