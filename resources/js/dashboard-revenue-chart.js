import {
    Chart,
    LineController,
    LineElement,
    PointElement,
    LinearScale,
    CategoryScale,
    Tooltip,
    Filler,
} from 'chart.js';

Chart.register(
    LineController,
    LineElement,
    PointElement,
    LinearScale,
    CategoryScale,
    Tooltip,
    Filler
);

window.addEventListener('load', () => {
    const chartWrapper = document.querySelector('[data-revenue-chart]');

    if (!chartWrapper) {
        return;
    }

    const canvas = document.getElementById('dashboardRevenueChart');

    if (!canvas) {
        return;
    }

    const chartData = JSON.parse(chartWrapper.dataset.revenueChart || '[]');

    new Chart(canvas, {
        type: 'line',
        data: {
            labels: chartData.map((item) => item.label),
            datasets: [
                {
                    label: 'Revenue',
                    data: chartData.map((item) => item.revenue),
                    fill: true,
                    tension: 0.35,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    callbacks: {
                        label(context) {
                            return `€ ${Number(context.parsed.y).toLocaleString('it-IT', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2,
                            })}`;
                        },
                    },
                },
            },
            scales: {
                /* x: {
                    grid: {
                        display: false,
                    },
                }, */
                /* y: {
                    beginAtZero: true,
                    ticks: {
                        callback(value) {
                            return `€ ${Number(value).toLocaleString('it-IT')}`;
                        },
                    },
                }, */
                x: {
                    grid: {
                        display: false,
                    },
                    ticks: {
                        maxRotation: 0,
                        minRotation: 0,
                        autoSkip: true,
                        maxTicksLimit: 4,
                    },
                },
                y: {
                    beginAtZero: true,
                    suggestedMax: 100,
                    ticks: {
                        precision: 0,
                        callback(value) {
                            return `€ ${Number(value).toLocaleString('it-IT')}`;
                        },
                    },
                },
            },
        },
    });
});