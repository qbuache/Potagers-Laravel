<x-guest-layout>
    <div class="col-lg-6 mx-auto">
        <x-page noHeader>
            <x-logo
                class="mx-auto"
                logo="logo3"
                width="300px"
            />

            <h5 class="mt-2 text-center">
                This is a secure area of the application. Please confirm your password before continuing
            </h5>

            <x-validation-errors />

            <form
                method="POST"
                action="{{ route('password.confirm') }}"
            >
                @csrf
                <x-form.input
                    name="password"
                    type="password"
                    autocomplete="current-password"
                    required
                />
                <x-form.submit fa="right-to-bracket">
                    {{ __('messages.label.confirm_password') }}
                </x-form.submit>
            </form>
        </x-page>
    </div>
</x-guest-layout>
