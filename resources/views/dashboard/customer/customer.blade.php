<x-layout :hideSubscription="auth()->check() && auth()->user()->isActive()" :fullHeight="true" title="{{__('dashboards.customer')}}">
    <header>
        <div class="container-fluid vh-100 img-custom">
            <div class="row h-75 justify-content-center align-items-center">
                <div class="col-12 d-flex flex-column align-items-center">
                    <h1 class="text-center display-1 text-yn shadow title">
                        OLIMPIA CLUB HOUSE
                    </h1>
                    <p class="lead display-3 under-title text-yn text-center">{{__('general.tagline')}}</p>
                    <p class="text-center text-w display-4 under-title">{{__('general.description')}}</p>
                    <div class="row justify-content-center align items-center"></div>
                    <div class="cta-buttons">
                        @guest
                        <a href="{{ route('register') }}" class="btn btn-primary-custom text-black">{{Str::upper(__('auth.register_now'))}}</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-custom">{{Str::upper(__('auth.login_now'))}}</a>
                        @endguest
                        @auth
                        @if(auth()->user()->isActive())
                        <a href="#iscrizione" class="btn btn-primary-custom text-black">{{Str::upper(__('general.booking_lesson'))}}</a>
                        @else
                        <a href="#iscrizione" class="btn btn-primary-custom text-black">{{Str::upper(__('general.subscribe_now'))}}</a>
                        @endif
                        <a href="#corsi" class="btn btn-outline-custom">{{Str::upper(__('general.show_classes'))}}</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>
</x-layout>