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
                <i class="fas fa-calendar-days"></i>
                <span>{{ trans_choice('general.calendary', 1) }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ __('general.daily_agenda')}}</a>
                <a href="#">{{ __('general.weekly_agenda')}}</a>
                <a href="#">{{ __('general.availability')}}</a>
            </div>
        </div>

        <div class="dashboard-sidebar-group">
            <button class="dashboard-sidebar-link dashboard-sidebar-dropdown-toggle" type="button">
                <i class="fas fa-dumbbell"></i>
                <span>{{ __('auth.my_lessons') }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ trans_choice('general.list', 1) }}</a>
                <a href="#">{{ trans_choice('general.calendary', 1) }}</a>
                <a href="#">{{ __('general.next_lessons') }}</a>
                <a href="#">{{ __('general.class_history') }}</a>
            </div>
        </div>

        <div class="dashboard-sidebar-group">
            <button class="dashboard-sidebar-link dashboard-sidebar-dropdown-toggle" type="button">
                <i class="fas fa-calendar-check"></i>
                <span>{{ trans_choice('general.booking', 2) }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ __('general.booking_lessons') }}</a>
                <a href="#">{{ __('general.booking_services') }}</a>
            </div>
        </div>

        <div class="dashboard-sidebar-group">
            <button class="dashboard-sidebar-link dashboard-sidebar-dropdown-toggle" type="button">
                <i class="fas fa-users"></i>
                <span>{{ trans_choice('general.customer', 2) }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ __('general.roster') }}</a>
                <a href="#">{{ __('general.gym_cards') }}</a>
                <a href="#">{{ trans_choice('general.goal', 2) }}</a>
            </div>
        </div>

        <div class="dashboard-sidebar-group">
            <button class="dashboard-sidebar-link dashboard-sidebar-dropdown-toggle" type="button">
                <i class="fas fa-spa"></i>
                <span>{{ trans_choice('general.service', 2) }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ __('general.personal_training') }}</a>
                <a href="#">{{ trans_choice('general.appointment', 2) }}</a>
            </div>
        </div>

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