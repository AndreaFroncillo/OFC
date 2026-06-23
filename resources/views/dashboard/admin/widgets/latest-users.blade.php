@props([
'latestUsers',
])

<div class="dashboard-widget dashboard-latest-users-widget">
    <div class="dashboard-widget-header">
        <div>
            <p class="dashboard-kicker mb-1">{{ trans_choice('auth.customer', 2) }}</p>
            <h2 class="dashboard-widget-title">{{ __('general.recent_members') }}</h2>
        </div>
        <i class="fas fa-user-clock dashboard-widget-header-icon"></i>
    </div>

    <div class="dashboard-list">
        @forelse($latestUsers as $user)
        <a href="#" class="dashboard-list-item dashboard-member-item">
            <div class="dashboard-avatar">
                {{ $user['initials'] }}
            </div>

            <div class="dashboard-list-content">
                <h4>{{ $user['name'] }}</h4>

                <div class="dashboard-member-meta">
                    <span>
                        {{ __('mail.email') }}:
                        <strong>{{ $user['mail'] }}</strong>
                    </span>

                    <span>
                        {{ trans_choice('subscription-plans.plan', 1) }}:
                        <strong>{{ $user['plan'] }}</strong>
                    </span>

                    <span>
                        {{ trans_choice('auth.insurance', 1) }}:
                        <strong>{{ $user['insurance'] }}</strong>
                    </span>
                </div>

                <div class="dashboard-member-badges mt-1">
                    <span class="dashboard-badge {{ $user['planBadgeClass'] }}">
                        {{ $user['planBadgeText'] }}
                    </span>

                    <span class="dashboard-badge {{ $user['insuranceBadgeClass'] }}">
                        {{ $user['insuranceBadgeText'] }}
                    </span>
                </div>
            </div>

            <i class="fas fa-arrow-right dashboard-list-arrow"></i>
        </a>
        @empty
        <div class="dashboard-empty-state">
            <i class="fas fa-users-slash"></i>
            <p>{{ __('general.no_users_found') }}</p>
        </div>
        @endforelse
    </div>

    <a href="#" class="dashboard-widget-link">
        {{ __('quick.manage_users') }}
        <i class="fas fa-arrow-right"></i>
    </a>
</div>