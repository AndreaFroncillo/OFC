@props([
'revenueChartData',
])

<div class="dashboard-widget dashboard-revenue-chart-widget">
    <div class="dashboard-widget-header">
        <div>
            <p class="dashboard-kicker mb-1">{{ __('kpi.revenue') }}</p>
            <h2 class="dashboard-widget-title">{{ __('kpi.revenue_overview') }}</h2>
        </div>
        <i class="fas fa-chart-line dashboard-widget-header-icon"></i>
    </div>

    <div
        class="dashboard-revenue-chart"
        data-revenue-chart='@json($revenueChartData)'>
        <canvas id="dashboardRevenueChart"></canvas>
    </div>
</div>