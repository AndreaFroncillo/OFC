<x-layout :hideSubscription="true" :fullHeight="false" title="{{__('auth.login_title')}}">
    <section id="iscrizione" class="section section-gradient mt-5">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <h3 class="mb-4 text-b section-title">{{__('auth.login')}}</h3>
                <div class="col-lg-6">
                    <div class="form-container">
                        <form method="POST" action="{{route('login')}}" data-prevent-double-submit>
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="{{ __('form.email') }}" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="{{ __('form.password') }}" name="password" required>
                            </div>
                            <x-buttons.button
                                type="submit"
                                variant="public-primary"
                                class="w-100 text-b">
                                {{ __('auth.login') }}
                            </x-buttons.button>
                            <p class="text-muted mt-3 text-center">{{__('auth.dont_have_account')}} <a href="{{ route('register') }}" class="text-warning">{{__('auth.register_here')}}</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>