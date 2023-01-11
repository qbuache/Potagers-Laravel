<x-guest-layout>
    <div class="col-lg-6 mx-auto">
        <x-page noHeader>
            <x-logo
                class="mx-auto"
                logo="logo3"
                width="300px"
            />
            <h5 class="mt-2 text-center">
                {{ __('messages.text.verify_email') }}
            </h5>
            @if (session('status') == 'verification-link-sent')
                <div class="mt-2 text-center">
                    {{ __('messages.text.verification_link_sent') }}
                </div>
            @endif
            <form
                method="POST"
                action="{{ route('verification.send') }}"
            >
                @csrf
                <x-form.submit fa="repeat">
                    {{ __('messages.label.resend_verification_email') }}
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
        </x-page>
    </div>
</x-guest-layout>
