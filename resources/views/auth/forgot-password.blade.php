<x-guest-layout>
    <div class="col-lg-6 mx-auto">
        <x-page noHeader>

            <x-logo
                class="mx-auto"
                logo="logo3"
                width="300px"
            />

            <div class="mt-2 mb-3">
                {{ __('passwords.forgot_explanation') }}
            </div>

            <!-- Validation Errors -->
            <x-validation-errors
                class="mb-4"
                :errors="$errors"
            />

            <form
                action="{{ route('password.email') }}"
                method="POST"
            >
                @csrf

                <x-form.input
                    name="email"
                    type="email"
                    :value="old('email')"
                    autofocus
                    required
                />

                <div class="d-flex align-items-center justify-content-between mt-3">
                    <span></span>
                    <x-form.submit>
                        Demander un lien de réinitialisation de mot de passe
                    </x-form.submit>
                </div>
            </form>
        </x-page>
    </div>
</x-guest-layout>
