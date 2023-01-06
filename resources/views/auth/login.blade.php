<x-guest-layout>
    <div class="col-lg-6 mx-auto">
        <x-page noHeader>
            <x-logo
                class="mx-auto"
                logo="logo3"
                width="300px"
            />

            <h5 class="mt-2 text-center">
                Veuillez vous connecter pour continuer
            </h5>

            <x-validation-errors />

            <form
                action="{{ route('login') }}"
                method="POST"
            >
                @csrf
                <x-form.input
                    name="email"
                    type="email"
                    autofocus
                    required
                />
                <x-form.input
                    name="password"
                    type="password"
                    autocomplete="current-password"
                    required
                />

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label
                        class="inline-flex items-center"
                        for="remember_me"
                    >
                        <input
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            id="remember_me"
                            name="remember"
                            type="checkbox"
                        >
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <x-form.submit fa="right-to-bracket">
                    <x-slot name="supp">
                        @if (Route::has('password.request'))
                            <x-link href="{{ route('password.request') }}">
                                {{ __('messages.label.forgot_password') }}
                            </x-link>
                        @endif
                        <x-link href="{{ route('register') }}">
                            {{ __('messages.label.register') }}
                        </x-link>
                    </x-slot>
                    {{ __('messages.label.login') }}
                </x-form.submit>
            </form>
        </x-page>
    </div>
</x-guest-layout>
