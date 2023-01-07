<x-app-layout>
    <div class="col-lg-10 mx-auto">
        <x-page>
            <form
                action="{{ route('potagers.update_jardinier', $potager->id) }}"
                method="POST"
            >
                @csrf
                @method('PATCH')
                @if ($users->isNotEmpty())
                    <x-form.select
                        name="user_id"
                        label="jardinier"
                        :items="$users"
                        :use="['id', 'name']"
                    />
                @else
                    <x-alert>Il n'y a pas de jardinier</x-alert>
                @endif
                <x-form.submit />
            </form>
        </x-page>
    </div>
</x-app-layout>
