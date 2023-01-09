<x-app-layout>
    <x-page>
        <x-btn-group>
            @can(Permissions::CREATE_USERS)
                <x-link
                    href="users/create"
                    fa="plus"
                >Créer un jardinier</x-link>
            @endcan
        </x-btn-group>
        <div class="list-group">
            @foreach ($users as $user)
                <a
                    class="list-group-item list-group-item-action"
                    href="{{ url("users/{$user->id}") }}"
                >
                    {{ $user->name }}
                </a>
            @endforeach
        </div>
    </x-page>
</x-app-layout>
