<nav class="navbar navbar-expand-lg bg-black text-w fixed-top nav-custom">
    <div class="container-fluid">
        <a class="navbar-brand text-w" href="{{route('homepage')}}">
            <img src="{{ asset('storage/img/LogoNoBg1.png') }}" alt="Logo Olimpia Club House" width="150px" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-w" aria-current="page" href="{{route('homepage')}}">{{__('general.home')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-w" aria-current="page" href="{{route('dashboard')}}">{{__('dashboards.dashboard')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-w" href="#">{{trans_choice('subscription-plans.subscription', 2)}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-w" href="#">{{trans_choice('general.lesson', 2)}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-w" href="#">{{trans_choice('general.trainer', 2)}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-w" href="#">{{__('general.about_us')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-w" href="#">{{trans_choice('general.faq', 2)}}</a>
                </li>
                @guest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('auth.login')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('login')}}">{{__('auth.login')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('register')}}">{{__('auth.register')}}</a></li>
                    </ul>
                </li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('auth.hello')}} {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item logout-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{__('auth.logout')}}</a>
                            <form action="{{route('logout')}}" method="POST" class="d-none" id="form-logout">@csrf</form>
                        </li>
                    </ul>
                </li>
                @endauth

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('general.lang')}}
                    </a>
                    <ul class="dropdown-menu p-0 border-0 shadow-none ul-flag">
                        <li><x-_locale lang="it" /></li>
                        <li><x-_locale lang="en" /></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>