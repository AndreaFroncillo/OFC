@props([
'statsCards',
])

<div class="dashboard-stats-grid">
    @foreach($statsCards as $statsCard)
    <a href="{{ $statsCard['url'] }}" class="dashboard-stat-card">
        <div class="dashboard-stat-icon">
            <i class="{{ $statsCard['icon'] }}"></i>
        </div>

        <div class="dashboard-stat-content">
            <p class="dashboard-stat-label">{{ $statsCard['label'] }}</p>
            <h3 class="{{ $statsCard['valueClass'] }}">{{ $statsCard['value'] }}</h3>

            <div class="dashboard-stat-footer">
                <span class="{{ $statsCard['trendClass'] }} fw-bolder fs-6">
                    {{ $statsCard['trend'] }}
                </span>
                <span class="dashboard-stat-description fs-6">
                    {{ $statsCard['description'] }}
                </span>
            </div>
        </div>
    </a>
    @endforeach
</div>