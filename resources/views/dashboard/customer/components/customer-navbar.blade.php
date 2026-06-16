<aside class="dashboard-sidebar bg-black text-w" id="dashboardSidebar">
    <div class="dashboard-sidebar-header">
        <button class="dashboard-sidebar-toggle" type="button" id="dashboardSidebarToggle" aria-label="Toggle sidebar">
            <i class="fas fa-chevron-right sidebar-icon-closed"></i>
            <i class="fas fa-chevron-left sidebar-icon-open"></i>
        </button>

        <a class="dashboard-sidebar-logo" href="{{ route('homepage') }}">
            <img src="{{ asset('storage/img/LogoNoBg1.png') }}" alt="Logo Olimpia Club House" class="img-fluid">
        </a>
    </div>

    <nav class="dashboard-sidebar-nav">
        <a class="dashboard-sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <i class="fas fa-gauge-high"></i>
            <span>{{ __('dashboards.dashboard') }}</span>
        </a>

        <div class="dashboard-sidebar-group">
            <button class="dashboard-sidebar-link dashboard-sidebar-dropdown-toggle" type="button">
                <i class="fas fa-id-card"></i>
                <span>{{ trans_choice('subscription-plans.plan', 2) }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ trans_choice('auth.insurance', 1) }}</a>
                <a href="#">{{ __('subscription-plans.my-plan') }}</a>
                <a href="#">{{ __('auth.entry_package') }}</a>
                <a href="#">{{ trans_choice('subscription-plans.subscription', 2) }}</a>
            </div>
        </div>

        <div class="dashboard-sidebar-group">
            <button class="dashboard-sidebar-link dashboard-sidebar-dropdown-toggle" type="button">
                <i class="fas fa-dumbbell"></i>
                <span>{{ trans_choice('general.lesson', 2) }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ trans_choice('general.list', 1) }}</a>
                <a href="#">{{ __('general.scheduled') }}</a>
                <a href="#">{{ __('general.workout') }}</a>
                <a href="#">{{ __('auth.your_prenotations') }}</a>
            </div>
        </div>

        <div class="dashboard-sidebar-group">
            <button class="dashboard-sidebar-link dashboard-sidebar-dropdown-toggle" type="button">
                <i class="fas fa-spa"></i>
                <span>{{ trans_choice('general.service', 2) }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ __('general.all_services') }}</a>
                <span class="dashboard-sidebar-subtitle">{{ __('general.training') }}</span>
                <a href="#">{{ __('general.personal_training') }}</a>
                <a href="#">{{ __('general.postural_gym') }}</a>
                <a href="#">{{ __('general.preparation') }}</a>
                <span class="dashboard-sidebar-subtitle">{{ trans_choice('general.therapy', 2) }}</span>
                <a href="#">{{ __('general.therapies') }}</a>
                <a href="#">{{ __('general.massotherapy') }}</a>
                <a href="#">{{ trans_choice('general.massage', 2) }}</a>
                <span class="dashboard-sidebar-subtitle">{{ __('general.body') }}</span>
                <a href="#">{{ __('general.nutrition') }}</a>
                <a href="#">{{ __('general.bia') }}</a>
            </div>
        </div>

        <div class="dashboard-sidebar-group">
            <button class="dashboard-sidebar-link dashboard-sidebar-dropdown-toggle" type="button">
                <i class="fas fa-calendar-check"></i>
                <span>{{ __('general.book') }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ trans_choice('general.lesson', 2) }}</a>
                <a href="#">{{ __('general.training') }}</a>
                <a href="#">{{ trans_choice('general.therapy', 2) }}</a>
                <a href="#">{{ __('general.body_analysis') }}</a>
            </div>
        </div>

        <a class="dashboard-sidebar-link" href="#">
            <i class="fas fa-list-check"></i>
            <span>{{ __('auth.your_prenotations') }}</span>
        </a>

        <a class="dashboard-sidebar-link" href="#">
            <i class="fas fa-circle-question"></i>
            <span>{{ trans_choice('general.faq', 2) }}</span>
        </a>

        <x-partials.flags_dropdown />
    </nav>

    <div class="dashboard-sidebar-footer">
        <div class="dashboard-sidebar-group">
            <button class="dashboard-sidebar-link dashboard-sidebar-dropdown-toggle" type="button">
                <i class="fas fa-user-circle"></i>
                <span>{{ __('auth.hello') }} {{ Auth::user()->name }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="{{ route('homepage') }}">{{ __('auth.go_home') }}</a>
                <a href="#">{{ __('auth.profile') }}</a>
                <a href="#" onclick="event.preventDefault(); document.querySelector('#dashboard-form-logout').submit();">
                    {{ __('auth.logout') }}
                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-none" id="dashboard-form-logout">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</aside>