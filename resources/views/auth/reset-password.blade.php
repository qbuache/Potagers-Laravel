<x-guest-layout>
    <div class="col-lg-6 mx-auto">
        <x-page noHeader>
            <x-logo
                class="mx-auto"
                logo="logo3"
                width="300px"
            />
            <h5 class="mt-2 text-center">
                {{ __('messages.text.confirm_password') }}
            </h5>
            <x-validation-errors class="my-3" />
            <form
                action="{{ route('password.update') }}"
                method="POST"
            >
                @csrf
                <input
                    name="token"
                    type="hidden"
                    value="{{ $request->route('token') }}"
                >
                <x-form.input
                    name="email"
                    type="email"
                    autofocus
                    required
                />
                <x-form.input
                    name="password"
                    type="password"
                    required
                />
                <x-form.input
                    name="password_confirmation"
                    type="password"
                    required
                />
                <x-form.submit fa="right-to-bracket">
                    {{ __('messages.label.reset_password') }}
                </x-form.submit>
            </form>
        </x-page>
    </div>
</x-guest-layout>
