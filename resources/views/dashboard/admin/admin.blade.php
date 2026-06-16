<x-layout :dashboard="true" :fullHeight="true" :hideSubscription="true" title="{{ __('dashboards.admin') }}">
    <section class="dashboard-page">
        <div class="dashboard-page-header">
            <div>
                <p class="dashboard-kicker">{{ __('dashboards.admin') }}</p>
                <h1 class="dashboard-title">
                    Ciao {{ auth()->user()->name }}, bentornato
                </h1>
                <p class="dashboard-subtitle">
                    Panoramica generale di utenti, lezioni, prenotazioni e attività della palestra.
                </p>
            </div>

            <div class="dashboard-header-actions">
                <a href="{{ route('homepage') }}" class="btn btn-outline-custom">
                    Vai al sito
                </a>
            </div>
        </div>

        <x-admin::stats-cards />

        <div class="dashboard-grid">
            <x-admin::quick-actions />

            <x-admin::latest-users />

            <x-admin::next-lessons />
        </div>
    </section>
</x-layout>