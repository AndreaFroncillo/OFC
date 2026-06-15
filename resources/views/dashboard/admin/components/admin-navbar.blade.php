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
                        {{trans_choice('auth.user', 2)}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{__('auth.all_users')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('auth.customer', 2)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.trainer', 2)}}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{trans_choice('general.lesson', 2)}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{__('general.all_lessons')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.new_lesson')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.booking_lessons')}}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{trans_choice('general.service', 2)}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{__('general.all_services')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.booking_services')}}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{trans_choice('subscription-plans.subscription', 2)}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{trans_choice('subscription-plans.plan', 2)}} {{trans_choice('subscription-plans.subscription', 1)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('subscription-plans.active', 2)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('subscription-plans.entry_package', 2)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('auth.insurance', 2)}}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{trans_choice('general.payment', 2)}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.enrollment', 2)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('subscription-plans.subscription', 2)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.service', 2)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.single_lesson', 2)}}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{trans_choice('general.setting', 2)}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.faq', 2)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.newsletter', 2)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{trans_choice('general.service', 2)}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('general.content_web_site')}}</a></li>
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