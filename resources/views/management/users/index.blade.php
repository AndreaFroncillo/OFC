<x-layout :dashboard="true" :fullHeight="true" :hideSubscription="true" title="{{ trans_choice('auth.user', 2) }}">
    <section class="dashboard-page management-page">
        <x-dashboard.breadcrumb
            :items="[
            ['label' => __('dashboards.dashboard'), 'url' => route('dashboard')],
            ['label' => trans_choice('auth.user', 2)],   
        ]" />
        <div class="management-header">
            <div>
                <p class="dashboard-kicker mb-1">{{ __('dashboards.admin') }}</p>
                <h1 class="dashboard-title">{{ trans_choice('auth.user', 2) }}</h1>
                <p class="dashboard-subtitle">{{ __('general.manage_users_text') }}</p>
            </div>

            <x-dashboard.topbar-actions />
        </div>

        <div class="management-toolbar">
            <div class="management-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="{{ __('general.search') }}">
            </div>

            <select class="management-filter rounded-5">
                <option>{{ __('general.all_statuses') }}</option>
            </select>

            <a href="{{ route('users.create') }}" class="management-primary-action">
                <i class="fas fa-user-plus"></i>
                <span>{{ __('quick.new_user') }}</span>
            </a>
        </div>

        <div class="management-users-grid">
            @forelse($users as $user)
            <article class="management-user-card">
                <div class="management-user-card-header">
                    <div class="dashboard-avatar">
                        {{ strtoupper(substr($user->name, 0, 1) . substr($user->surname ?? '', 0, 1)) }}
                    </div>

                    <div>
                        <h2>{{ trim($user->name . ' ' . ($user->surname ?? '')) }}</h2>
                        <p>{{ $user->email }}</p>
                    </div>
                </div>

                <div class="management-user-card-meta">
                    <span>
                        <i class="fas fa-user-tag"></i>
                        {{ $user->role?->label ?? __('general.registered_user') }}
                    </span>

                    <span>
                        <i class="fas fa-id-card"></i>
                        {{ $user->code }}
                    </span>

                    <span>
                        <i class="fas fa-calendar-plus"></i>
                        {{ $user->created_at?->format('d/m/Y') }}
                    </span>
                </div>

                <div class="management-user-card-badges">
                    <span class="dashboard-badge {{ $user->status_badge_class }}">
                        {{ $user->status_label }}
                    </span>
                </div>

                <div class="management-user-card-actions">
                    <a href="{{ route('users.show', $user) }}">
                        <i class="fas fa-eye"></i>
                        {{ __('general.view') }}
                    </a>

                    <a href="{{ route('users.edit', $user) }}">
                        <i class="fas fa-pen"></i>
                        {{ __('general.edit') }}
                    </a>
                </div>
            </article>
            @empty
            <div class="dashboard-empty-state management-empty-state">
                <i class="fas fa-users-slash"></i>
                <p>{{ __('general.no_users_found') }}</p>
            </div>
            @endforelse
        </div>

        <div class="management-pagination">
            {{ $users->links() }}
        </div>
    </section>
</x-layout>