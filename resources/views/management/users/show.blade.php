<x-layout :dashboard="true" :fullHeight="true" :hideSubscription="true" title="{{ $user->name }} {{ $user->surname }}">
    <section class="dashboard-page management-page">
        <x-dashboard.breadcrumb
            :items="[
                ['label' => __('dashboards.dashboard'), 'url' => route('dashboard')],
                ['label' => trans_choice('auth.user', 2), 'url' => route('users.index')],
                ['label' => trim($user->name . ' ' . ($user->surname ?? ''))],
            ]" />

        <div class="management-header">
            <div>
                <p class="dashboard-kicker mb-1">{{ trans_choice('auth.user', 1) }}</p>

                <h1 class="dashboard-title">
                    {{ trim($user->name . ' ' . ($user->surname ?? '')) }}
                </h1>

                <p class="dashboard-subtitle">
                    {{ $user->code }}
                    ·
                    <a href="mailto:{{ $user->email }}" class="management-header-email">
                        {{ $user->email }}
                    </a>
                </p>
            </div>

            <x-dashboard.topbar-actions />
        </div>

        <div class="management-toolbar">
            <a href="{{ route('users.index') }}" class="management-primary-action">
                <i class="fas fa-arrow-left"></i>
                <span>{{ __('general.back') }}</span>
            </a>

            <a href="{{ route('users.edit', $user) }}" class="management-primary-action">
                <i class="fas fa-pen"></i>
                <span>{{ __('general.edit') }}</span>
            </a>
        </div>

        <div class="management-detail-grid">
            <article class="management-user-card management-detail-card">
                <div class="management-user-card-header">
                    <div class="dashboard-avatar">
                        {{ strtoupper(substr($user->name, 0, 1) . substr($user->surname ?? '', 0, 1)) }}
                    </div>

                    <div>
                        <h2>{{ trim($user->name . ' ' . ($user->surname ?? '')) }}</h2>
                        <p>{{ $user->role?->label ?? __('general.registered_user') }}</p>
                    </div>
                </div>

                <div class="management-profile-grid">
                    <div class="management-profile-item-primary-text">
                        <small>{{ __('general.customer_code') }}</small>
                        <strong>{{ $user->code ?? __('general.not_available') }}</strong>
                    </div>

                    <div class="management-profile-item">
                        <small>{{ __('auth.fiscal_code') }}</small>
                        <strong>{{ $user->fiscal_code ?? __('general.not_available') }}</strong>
                    </div>

                    <div class="management-profile-item">
                        <small>{{ __('auth.phone') }}</small>
                        <strong>{{ $user->phone ?? __('general.not_available') }}</strong>
                    </div>

                    <div class="management-profile-item">
                        <small>{{ __('general.birth_date') }}</small>
                        <strong>{{ $user->birth_date?->format('d/m/Y') ?? __('general.not_available') }}</strong>
                    </div>

                    <div class="management-profile-item">
                        <small>{{ __('general.created_at') }}</small>
                        <strong>{{ $user->created_at?->format('d/m/Y') ?? __('general.not_available') }}</strong>
                    </div>

                    <div class="management-profile-item">
                        <small>{{ __('general.city') }}</small>
                        <strong>
                            {{ $user->city ?? __('general.not_available') }}
                            @if($user->province)
                            ({{ $user->province }})
                            @endif
                        </strong>
                    </div>

                    <div class="management-profile-item">
                        <small>{{ __('general.address') }}</small>
                        <strong>
                            @if($user->address)
                            {{ $user->address }} {{ $user->street_number }}
                            @else
                            {{ __('general.not_available') }}
                            @endif
                        </strong>
                    </div>

                    <div class="management-profile-item">
                        <small>{{ trans_choice('general.goal', 1) }}</small>
                        <strong>{{ $user->goal ?? __('general.not_available') }}</strong>
                    </div>
                </div>

                <div class="management-user-card-badges">
                    <span class="dashboard-badge {{ $user->status_badge_class }}">
                        {{ $user->status_label }}
                    </span>
                </div>
            </article>

            <article class="management-user-card management-detail-card">
                <div class="management-detail-card-header">
                    <h2 class="management-detail-title">
                        {{ __('general.gym_access') }}
                    </h2>

                    <span class="dashboard-badge {{ $user->canAccessGym() ? 'dashboard-badge-success' : 'dashboard-badge-danger' }}">
                        {{ $user->canAccessGym() ? __('general.access_allowed') : __('general.access_denied') }}
                    </span>
                </div>

                <div class="management-status-list">
                    <div class="management-status-row">
                        <span class="management-status-row-label">
                            {{ trans_choice('general.enrollment', 1) }}
                        </span>

                        <span class="dashboard-badge {{ $user->hasActiveSubscription() ? 'dashboard-badge-success' : 'dashboard-badge-danger' }}">
                            {{ $user->hasActiveSubscription() ? __('general.active_registration') : __('general.no_active_registration') }}
                        </span>
                    </div>

                    <div class="management-status-row">
                        <span class="management-status-row-label">
                            {{ trans_choice('auth.insurance', 1) }}
                        </span>

                        <span class="dashboard-badge {{ $user->hasActiveInsurance() ? 'dashboard-badge-success' : 'dashboard-badge-danger' }}">
                            {{ $user->hasActiveInsurance() ? __('general.active_insurance') : __('general.no_active_insurance') }}
                        </span>
                    </div>

                    <div class="management-status-row">
                        <span class="management-status-row-label">
                            {{ trans_choice('subscription-plans.subscription', 1) }}
                        </span>

                        <span class="dashboard-badge {{ $user->hasActiveSubscription() ? 'dashboard-badge-success' : 'dashboard-badge-danger' }}">
                            {{ $user->hasActiveSubscription() ? __('general.active_plan') : __('general.no_active_plan') }}
                        </span>
                    </div>

                    <div class="management-status-row">
                        <span class="management-status-row-label">
                            {{ trans_choice('subscription-plans.entry_package', 1) }}
                        </span>

                        <span class="dashboard-badge {{ $user->hasActiveEntryPackage() ? 'dashboard-badge-success' : 'dashboard-badge-danger' }}">
                            {{ $user->hasActiveEntryPackage() ? __('general.active_entry_package') : __('general.no_entry_package') }}
                        </span>
                    </div>
                </div>
            </article>
        </div>

        <div class="management-detail-grid">
            <article class="management-user-card management-detail-card">
                <h2 class="management-detail-title">{{ trans_choice('auth.insurance', 2) }}</h2>

                <div class="management-detail-list">
                    @forelse($user->insurancePolicies->take(3) as $policy)
                    <div class="management-detail-list-item">
                        <strong>{{ $policy->policy_number ?? __('general.not_available') }}</strong>
                        <span>{{ $policy->start_date?->format('d/m/Y') }} - {{ $policy->end_date?->format('d/m/Y') }}</span>

                        <span class="dashboard-badge {{ $policy->isActive() ? 'dashboard-badge-success' : 'dashboard-badge-warning' }}">
                            {{ __('status.' . $policy->status) }}
                        </span>
                    </div>
                    @empty
                    <p class="management-muted">{{ __('general.not_available') }}</p>
                    @endforelse
                </div>
            </article>

            <article class="management-user-card management-detail-card">
                <h2 class="management-detail-title">{{ trans_choice('subscription-plans.subscription', 2) }}</h2>

                <div class="management-detail-list">
                    @forelse($user->subscriptions->take(3) as $subscription)
                    <div class="management-detail-list-item">
                        <strong>{{ $subscription->subscriptionPlan?->name ?? __('general.not_available') }}</strong>
                        <span>{{ $subscription->start_date?->format('d/m/Y') }} - {{ $subscription->end_date?->format('d/m/Y') }}</span>

                        <span class="dashboard-badge {{ $subscription->isActive() ? 'dashboard-badge-success' : 'dashboard-badge-warning' }}">
                            {{ __('status.' . $subscription->status) }}
                        </span>
                    </div>
                    @empty
                    <p class="management-muted">{{ __('general.not_available') }}</p>
                    @endforelse
                </div>
            </article>

            <article class="management-user-card management-detail-card">
                <h2 class="management-detail-title">{{ trans_choice('subscription-plans.entry_package', 2) }}</h2>

                <div class="management-detail-list">
                    @forelse($user->entryPackages->take(3) as $package)
                    <div class="management-detail-list-item">
                        <strong>{{ $package->name }}</strong>
                        <span>{{ $package->remaining_entries }}/{{ $package->total_entries }} {{ __('general.entries') }}</span>
                    </div>
                    @empty
                    <p class="management-muted">{{ __('general.not_available') }}</p>
                    @endforelse
                </div>
            </article>

            <article class="management-user-card management-detail-card">
                <h2 class="management-detail-title">{{ trans_choice('general.payment', 2) }}</h2>

                <div class="management-detail-list">
                    @forelse($user->registrationPayments->take(3) as $payment)
                    <div class="management-detail-list-item">
                        <strong>{{ $payment->code }}</strong>
                        <span>€ {{ number_format($payment->amount, 2, ',', '.') }}</span>

                        <span class="dashboard-badge {{ $payment->isPaid() ? 'dashboard-badge-success' : 'dashboard-badge-warning' }}">
                            {{ __('status.' . $payment->status) }}
                        </span>
                    </div>
                    @empty
                    <p class="management-muted">{{ __('general.not_available') }}</p>
                    @endforelse
                </div>
            </article>
        </div>

        <div class="management-detail-grid management-detail-grid-full">
            <article class="management-user-card management-detail-card">
                <h2 class="management-detail-title">{{ trans_choice('general.lesson', 2) }}</h2>

                <div class="management-detail-list">
                    @forelse($user->bookings->take(5) as $booking)
                    <div class="management-detail-list-item">
                        <strong>{{ $booking->lesson?->title ?? __('general.not_available') }}</strong>
                        <span>{{ $booking->lesson?->date?->format('d/m/Y') }}</span>

                        <span class="dashboard-badge dashboard-badge-warning">
                            {{ __('status.' . $booking->status) }}
                        </span>
                    </div>
                    @empty
                    <p class="management-muted">{{ __('general.not_available') }}</p>
                    @endforelse
                </div>
            </article>

            <article class="management-user-card management-detail-card">
                <h2 class="management-detail-title">{{ trans_choice('general.service', 2) }}</h2>

                <div class="management-detail-list">
                    @forelse($user->serviceBookings->take(5) as $serviceBooking)
                    <div class="management-detail-list-item">
                        <strong>{{ $serviceBooking->service?->name ?? __('general.not_available') }}</strong>
                        <span>€ {{ number_format($serviceBooking->price ?? 0, 2, ',', '.') }}</span>

                        <span class="dashboard-badge dashboard-badge-warning">
                            {{ __('status.' . $serviceBooking->status) }}
                        </span>
                    </div>
                    @empty
                    <p class="management-muted">{{ __('general.not_available') }}</p>
                    @endforelse
                </div>
            </article>
        </div>
    </section>
</x-layout>