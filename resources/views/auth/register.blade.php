<x-guest-layout>
    <div class="col-lg-6 mx-auto">
        <x-page noHeader>
            <x-logo
                class="mx-auto"
                logo="logo3"
                width="300px"
            />

            <h5 class="mt-2 text-center">Création de mon compte</h5>

            <!-- Validation Errors -->
            <x-validation-errors
                class="mb-4"
                :errors="$errors"
            />

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

                <div class="d-flex align-items-center justify-content-between mt-3">
                    <a
                        class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('login') }}"
                    >
                        J'ai déjà un compte
                    </a>

                    <x-form.submit fa="right-to-bracket">
                        S'inscrire
                    </x-form.submit>

                </div>
            </form>
        </x-page>
    </div>
</x-guest-layout>
