<x-layout :hideSubscription="true" :fullHeight="false" title="{{__('auth.register_title')}}">
    <section id="iscrizione" class="section section-gradient mt-5">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <h3 class="mb-4 text-b section-title">{{ __('auth.register_now') }}</h3>
                <div class="col-lg-6">
                    <div class="form-container">
                        <form method="POST" action="{{route('register')}}">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="{{ __('form.name') }}" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="{{ __('form.surname') }}" name="surname" value="{{ old('surname') }}">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="{{ __('form.email') }}" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="{{ __('form.password') }}" name="password" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="{{ __('form.confirm_password') }}" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary-custom w-100 text-b">{{__('auth.register')}}</button>
                            <p class="text-muted mt-3 text-center">{{__('auth.already_have_account')}} <a href="{{ route('login') }}" class="text-warning">{{__('auth.login_here')}}</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>