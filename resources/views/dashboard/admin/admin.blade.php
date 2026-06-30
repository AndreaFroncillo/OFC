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

            <x-dashboard.topbar-actions />
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