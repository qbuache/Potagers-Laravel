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
                <x-form.submit fa="key">
                    {{ __('messages.label.confirm_password') }}
                </x-form.submit>
            </form>
        </x-page>
    </div>
</x-guest-layout>
