@php
    $element = $user ?? null;
    $route = empty($element) ? route('users.store') : route('users.update', $element->id);
@endphp
<x-app-layout>
    <x-page>
        <x-form.form
            :element="$element"
            :route="$route"
        >
            <x-form.input
                name="name"
                autofocus
                required
            />
            <x-form.input
                name="email"
                type="email"
                required
            />
            <x-form.submit />
        </x-form.form>
    </x-page>
</x-app-layout>
