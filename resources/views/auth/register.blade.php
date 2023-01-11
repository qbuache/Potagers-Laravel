<x-guest-layout>
    <div class="col-lg-6 mx-auto">
        <x-page noHeader>
            <x-logo
                class="mx-auto"
                logo="logo3"
                width="300px"
            />
            <h5 class="mt-2 text-center">{{ __('messages.text.account_creation') }}</h5>
            <x-validation-errors class="mb-3" />
            <form
                action="{{ route('register') }}"
                method="POST"
            >
                @csrf
                <x-form.input
                    name="name"
                    :value="old('name')"
                    autofocus
                    required
                />
                <x-form.input
                    name="email"
                    type="email"
                    :value="old('email')"
                    autofocus
                    required
                />
                <x-form.input
                    name="password"
                    type="password"
                    autocomplete="new-password"
                    required
                />
                <x-form.input
                    name="password_confirmation"
                    type="password"
                    autocomplete="new-password"
                    required
                />
                <x-form.submit fa="right-to-bracket">
                    <x-slot name="supp">
                        <x-link href="{{ route('login') }}">
                            {{ __('messages.label.already_registered') }}
                        </x-link>
                    </x-slot>
                    {{ __('messages.label.register') }}
                </x-form.submit>
            </form>
        </x-page>
    </div>
</x-guest-layout>
