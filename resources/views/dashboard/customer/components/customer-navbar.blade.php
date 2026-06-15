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
                        {{trans_choice('subscription-plans.plan', 2)}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{trans_choice('auth.insurance', 1)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('subscription-plans.my-plan')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('auth.entry_package')}}</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="#">{{trans_choice('subscription-plans.subscription', 2)}}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{trans_choice('general.lesson', 2)}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.list', 1)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.scheduled')}}</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="#">{{__('general.workout')}}</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="#">{{__('auth.your_prenotations')}}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{trans_choice('general.service', 2)}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{__('general.all_services')}}</a></li>
                        <li class='dropdown-header text-white bg-black'>{{__('general.training')}}</li>
                        <li><a class="dropdown-item" href="#">{{__('general.personal_training')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.postural_gym')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.preparation')}}</a></li>
                        <li class='dropdown-header text-white bg-black'>{{trans_choice('general.therapy', 2)}}</li>
                        <li><a class="dropdown-item" href="#">{{__('general.therapies')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.massotherapy')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.massage', 2)}}</a></li>
                        <li class='dropdown-header text-white bg-black'>{{__('general.body')}}</li>
                        <li><a class="dropdown-item" href="#">{{__('general.nutrition')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.bia')}}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('general.book')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.lesson', 2)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.training')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.therapy', 2)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.body_analysis')}}</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-w" href="#">{{__('auth.your_prenotations')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-w" href="#">{{trans_choice('general.faq', 2)}}</a>
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