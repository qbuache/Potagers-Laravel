<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-validation-errors
            class="mb-4"
            :errors="$errors"
        />

        <form
            action="{{ route('password.update') }}"
            method="POST"
        >
            @csrf

            <!-- Password Reset Token -->
            <input
                name="token"
                type="hidden"
                value="{{ $request->route('token') }}"
            >

            <!-- Email Address -->
            <div>
                <x-label
                    for="email"
                    :value="__('Email')"
                />

                <x-input
                    class="block mt-1 w-full"
                    id="email"
                    name="email"
                    type="email"
                    :value="old('email', $request->email)"
                    autofocus
                    required
                />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label
                    for="password"
                    :value="__('Password')"
                />

                <x-input
                    class="block mt-1 w-full"
                    id="password"
                    name="password"
                    type="password"
                    required
                />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label
                    for="password_confirmation"
                    :value="__('Confirm Password')"
                />

                <x-input
                    class="block mt-1 w-full"
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    required
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
