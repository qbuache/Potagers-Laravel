@php
    $element = $potager;
    $route = route('potagers.update_jardinier', $potager->id);
@endphp
<x-app-layout>
    <x-page>
        <x-form.form
            :element="$element"
            :route="$route"
        >
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
        </x-form.form>
    </x-page>
</x-app-layout>
