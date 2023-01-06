@php
    $element = $user ?? null;
    $route = empty($element) ? route('users.store') : route('users.update', $element->id);
@endphp
<x-app-layout>
    <div class="col-lg-10 mx-auto">
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
    </div>
</x-app-layout>
