<x-layout :dashboard="true" :fullHeight="true" :hideSubscription="true" title="{{ __('dashboards.admin') }}">
    <section class="dashboard-page">
        <div class="dashboard-page-header">
            <div>
                <p class="dashboard-kicker">{{ __('dashboards.admin') }}</p>
                <h1 class="dashboard-title">
                    {{ __('auth.hello') }} {{ auth()->user()->name }}, {{__('auth.welcome_back')}}
                </h1>
                <p class="dashboard-subtitle">
                    {{__('general.overview_text')}}
                </p>
            </div>

            <div class="dashboard-header-actions">
                <a href="{{ route('homepage') }}" class="btn btn-outline-custom">
                    {{ __('auth.go_home') }}
                </a>
            </div>
        </div>

        <x-admin::stats-cards :statsCards="$statsCards" />

        <div class="dashboard-grid">
            <x-admin::quick-actions />

            <x-admin::latest-users />

            <x-admin::next-lessons :nextLessons="$nextLessons"/>
        </div>
    </section>
</x-layout>