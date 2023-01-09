<x-guest-layout>
    <div class="col-lg-6 mx-auto">
        <x-page noHeader>
            <x-logo
                class="mx-auto"
                logo="logo3"
                width="300px"
            />

            <h5 class="mt-2 text-center">
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the
                link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.
            </h5>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mt-2 text-center">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <form
                method="POST"
                action="{{ route('verification.send') }}"
            >
                @csrf

                <x-form.submit fa="right-to-bracket">
                    {{ __('Resend Verification Email') }}
                </x-form.submit>
            </form>

            <form
                method="POST"
                action="{{ route('logout') }}"
            >
                @csrf

                <x-form.submit fa="right-to-bracket">
                    {{ __('messages.label.logout') }}
                </x-form.submit>
            </form>
    </div>
    </x-auth-card>
</x-guest-layout>
