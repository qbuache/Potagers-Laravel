<x-guest-layout>
    <div class="col-lg-6 mx-auto">
        <x-page noHeader>
            <x-logo
                class="mx-auto"
                logo="logo3"
                width="300px"
            />

            <h5 class="fw-bold my-3 text-center">
                Bienvenue sur le site des Potagers de la Bérée
            </h5>
            <div class="justify-content-center">
                <div class="d-grid d-sm-flex flex-fill gap-3">
                    @auth
                        <x-link
                            class="flex-grow-1"
                            href="{{ url('/dashboard') }}"
                        >Accueil</x-link>
                    @else
                        @if (Route::has('login'))
                            <x-link
                                class="flex-grow-1"
                                href="{{ route('login') }}"
                            >{{ __('messages.label.login') }}</x-link>
                        @endif
                        @if (Route::has('register'))
                            <x-link
                                class="flex-grow-1"
                                href="{{ route('register') }}"
                            >{{ __('messages.label.register') }}</x-link>
                        @endif
                    @endauth
                </div>
            </div>
        </x-page>
    </div>
</x-guest-layout>
