<x-layout>
    <header>
        <div class="container-fluid vh-100 img-custom" style="--hero-bg: url('{{ asset('storage/img/headerimage.jpg') }}');">
            <div class="row h-75 justify-content-center align-items-center">
                <div class="col-12 d-flex flex-column align-items-center">

                    <h1 class="text-center display-1 text-yn shadow title">
                        OLIMPIA CLUB HOUSE
                    </h1>

                    <p class="lead display-3 under-title text-yn text-center">
                        {{ __('general.tagline') }}
                    </p>

                    <p class="text-center text-w display-4 under-title">
                        {{ __('general.description') }}
                    </p>


                    <div class="cta-buttons">
                        @guest

                        <x-buttons.button
                            href="{{ route('register') }}"
                            variant="public-primary"
                            class="text-black">
                            {{ Str::upper(__('auth.register_now')) }}
                        </x-buttons.button>

                        <x-buttons.button
                            href="{{ route('login') }}"
                            variant="public-outline">
                            {{ Str::upper(__('auth.login_now')) }}
                        </x-buttons.button>

                        @endguest

                        @auth

                        <x-buttons.button
                            href="#iscrizione"
                            variant="public-primary"
                            class="text-black">
                            {{ Str::upper(__('general.subscribe_now')) }}
                        </x-buttons.button>

                        <x-buttons.button
                            href="#corsi"
                            variant="public-outline">
                            {{ Str::upper(__('general.show_classes')) }}
                        </x-buttons.button>

                        @endauth
                    </div>

                </div>
            </div>
        </div>
    </header>
</x-layout>