<x-guest-layout>
    <div class="col-lg-6 mx-auto">
        <x-page noHeader>
            <x-logo
                class="mx-auto"
                logo="logo3"
                width="300px"
            />
            <h5 class="mt-2 text-center">
                {{ __('messages.text.login_to_continue') }}
            </h5>
            <x-validation-errors class="my-3" />
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
                <div class="mt-2">
                    <x-form.simple.checkbox
                        id="remember"
                        name="remember"
                        type="checkbox"
                        chkLabel="{{ __('messages.label.remember_me') }}"
                    />
                </div>
                <x-form.submit
                    class="mb-3"
                    fa="right-to-bracket"
                >
                    <x-slot name="supp">
                        <div class="btn-group d-flex flex-column flex-lg-row">
                            <x-link href="{{ route('register') }}">
                                {{ __('messages.label.register') }}
                            </x-link>
                            @if (Route::has('password.request'))
                                <x-link href="{{ route('password.request') }}">
                                    {{ __('messages.label.forgot_password') }}
                                </x-link>
                            @endif
                        </div>
                    </x-slot>
                    {{ __('messages.label.login') }}
                </x-form.submit>
            </form>
        </x-page>
    </div>
</x-guest-layout>
