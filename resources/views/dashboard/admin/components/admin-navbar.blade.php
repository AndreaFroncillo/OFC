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
                <i class="fas fa-users"></i>
                <span>{{ trans_choice('auth.user', 2) }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ __('auth.all_users') }}</a>
                <a href="#">{{ trans_choice('auth.customer', 2) }}</a>
                <a href="#">{{ trans_choice('general.trainer', 2) }}</a>
            </div>
        </div>

        <div class="dashboard-sidebar-group">
            <button class="dashboard-sidebar-link dashboard-sidebar-dropdown-toggle" type="button">
                <i class="fas fa-dumbbell"></i>
                <span>{{ trans_choice('general.lesson', 2) }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ __('general.all_lessons') }}</a>
                <a href="#">{{ __('general.new_lesson') }}</a>
                <a href="#">{{ __('general.booking_lessons') }}</a>
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
                <a href="#">{{ __('general.booking_services') }}</a>
            </div>
        </div>

        <div class="dashboard-sidebar-group">
            <button class="dashboard-sidebar-link dashboard-sidebar-dropdown-toggle" type="button">
                <i class="fas fa-id-card"></i>
                <span>{{ trans_choice('subscription-plans.subscription', 2) }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ trans_choice('subscription-plans.plan', 2) }} {{ trans_choice('subscription-plans.subscription', 1) }}</a>
                <a href="#">{{ trans_choice('subscription-plans.active', 2) }}</a>
                <a href="#">{{ trans_choice('subscription-plans.entry_package', 2) }}</a>
                <a href="#">{{ trans_choice('auth.insurance', 2) }}</a>
            </div>
        </div>

        <div class="dashboard-sidebar-group">
            <button class="dashboard-sidebar-link dashboard-sidebar-dropdown-toggle" type="button">
                <i class="fas fa-credit-card"></i>
                <span>{{ trans_choice('general.payment', 2) }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ trans_choice('general.enrollment', 2) }}</a>
                <a href="#">{{ trans_choice('subscription-plans.subscription', 2) }}</a>
                <a href="#">{{ trans_choice('general.service', 2) }}</a>
                <a href="#">{{ trans_choice('general.single_lesson', 2) }}</a>
            </div>
        </div>

        <div class="dashboard-sidebar-group">
            <button class="dashboard-sidebar-link dashboard-sidebar-dropdown-toggle" type="button">
                <i class="fas fa-gear"></i>
                <span>{{ trans_choice('general.setting', 2) }}</span>
                <i class="fas fa-chevron-down dropdown-chevron"></i>
            </button>
            <div class="dashboard-sidebar-submenu">
                <a href="#">{{ trans_choice('general.faq', 2) }}</a>
                <a href="#">{{ trans_choice('general.newsletter', 2) }}</a>
                <a href="#">{{ trans_choice('general.service', 2) }}</a>
                <a href="#">{{ __('general.content_web_site') }}</a>
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