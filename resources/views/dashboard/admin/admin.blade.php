<x-layout :dashboard="true" :fullHeight="true" :hideSubscription="true" title="{{ __('dashboards.admin') }}">
    <section class="dashboard-page">
        <div class="dashboard-topbar">
            <div class="dashboard-topbar-left">
                <p class="dashboard-topbar-kicker">
                    {{ __('dashboards.admin') }}
                </p>

                <h1 class="dashboard-topbar-title">
                    {{ __('auth.hello') }} {{ auth()->user()->name }}, {{ __('auth.welcome_back') }}
                </h1>
            </div>

            <div class="dashboard-topbar-actions">
                <a href="{{ route('homepage') }}" class="dashboard-topbar-site-link">
                    <i class="fas fa-arrow-up-right-from-square"></i>
                    <span>{{ __('auth.go_home') }}</span>
                </a>

                <button type="button" class="dashboard-topbar-action-button" aria-label="Notifications">
                    <i class="fas fa-bell"></i>
                    <span class="dashboard-topbar-notification-dot"></span>
                </button>

                <div class="dashboard-topbar-profile-wrapper" id="dashboardTopbarProfileWrapper">
                    <button type="button" class="dashboard-topbar-profile" id="dashboardTopbarProfileToggle" aria-haspopup="true" aria-expanded="false">
                        <div class="dashboard-topbar-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <div class="dashboard-topbar-user">
                            <strong>
                                {{ auth()->user()->name }} {{ auth()->user()->surname }}
                            </strong>
                            <span>{{ __('dashboards.admin') }}</span>
                        </div>

                        <i class="fas fa-chevron-down dashboard-topbar-profile-icon"></i>
                    </button>

                    <div class="dashboard-topbar-profile-menu">
                        <a href="#">
                            <i class="fas fa-user"></i>
                            {{ __('auth.profile') }}
                        </a>

                        <a href="{{ route('homepage') }}">
                            <i class="fas fa-arrow-up-right-from-square"></i>
                            {{ __('auth.go_home') }}
                        </a>

                        <a href="#" onclick="event.preventDefault(); document.querySelector('#dashboard-topbar-form-logout').submit();">
                            <i class="fas fa-right-from-bracket"></i>
                            {{ __('auth.logout') }}
                        </a>

                        <form action="{{ route('logout') }}" method="POST" class="d-none" id="dashboard-topbar-form-logout">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <x-admin::stats-cards :statsCards="$statsCards" />
        <x-admin::revenue-chart :revenueChartData="$revenueChartData" />

        <div class="dashboard-grid">
            <div class="dashboard-column">
                <x-admin::quick-actions />
                <x-admin::next-lessons :nextLessons="$nextLessons" />
            </div>

            <div class="dashboard-column">
                <x-admin::latest-users :latestUsers="$latestUsers" />
            </div>
        </div>
    </section>
</x-layout>