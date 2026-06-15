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
                    <a class="nav-link text-w" aria-current="page" href="{{route('dashboard')}}">{{__('dashboards.dashboard')}}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('auth.my_lessons')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.list', 1)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.calendary', 1)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.next_lessons')}}</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="#">{{__('general.class_history')}}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{trans_choice('general.booking', 2)}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{__('general.booking_lessons')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.booking_services')}}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{trans_choice('general.customer', 2)}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{__('general.roster')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.gym_cards')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.goal', 2)}}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{trans_choice('general.service', 2)}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{__('general.personal_training')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.appointment', 2)}}</a></li>
                    </ul>
                </li>
                <x-partials.listitem_profile />
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