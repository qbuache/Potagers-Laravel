<x-app-layout>
    <x-page>
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
