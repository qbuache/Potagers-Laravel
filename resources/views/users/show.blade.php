<x-app-layout>
    <x-page>
        <x-btn-group>
            @can(Permissions::DELETE_POTAGERS)
                <x-button
                    class="btn__action"
                    data-bs-toggle="modal"
                    data-bs-target="#modalConfirm"
                    fa="trash"
                >Supprimer
                </x-button>
            @endcan
            @can(Permissions::EDIT_POTAGERS)
                <x-link
                    href="users/{{ $user->id }}/edit"
                    fa="pencil-alt"
                >Modifier</x-link>
            @endcan
            @can(Permissions::GIVE_PERMISSIONS)
                <x-link
                    href="users/{{ $user->id }}/permissions"
                    fa="lock"
                >Permissions</x-link>
            @endcan
        </x-btn-group>
        <x-card-line name="email">
            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
        </x-card-line>
        <x-card-line name="roles">
            <ul class="mb-0">
                @foreach ($user->roles as $role)
                    <li>{{ __("messages.label.{$role->name}") }}</li>
                @endforeach
            </ul>
        </x-card-line>
        <div class="card-line">
            <h5 class="text-custom">Potagers</h5>
            <x-card-line name="total_size">
                <x-sqm>{{ $user->potagers->sum('size') }}</x-sqm>
            </x-card-line>
            <div class="list-group card-line">
                @forelse ($user->potagers as $potager)
                    <a
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                        href="{{ url("potagers/{$potager->id}") }}"
                    >
                        <span>{{ $potager->name }}</span>
                        <small class="text-muted">{{ $potager->jardin->name }}</small>
                    </a>
                @empty
                    <x-alert>Pas de potager</x-alert>
                @endforelse
            </div>
        </div>
    </x-page>
    <x-modal-confirm
        action='{{ "users/$user->id" }}'
        method="DELETE"
    >
        Voulez-vous vraiment supprimer ce jardinier ?
    </x-modal-confirm>
</x-app-layout>
