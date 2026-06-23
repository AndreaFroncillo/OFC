<?php

namespace App\Services\Dashboard;

use App\Models\Booking\Booking;
use App\Models\Booking\ServiceBooking;
use App\Models\EntryPackage\EntryPackage;
use App\Models\Insurance\InsurancePolicy;
use App\Models\Lesson\Lesson;
use App\Models\RegistrationPayment;
use App\Models\Subscription\Subscription;
use App\Models\Trainer\Trainer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class AdminDashboardService
{
    public function getNextLessons(): Collection
    {
        return Lesson::upcoming()
            ->scheduled()
            ->with([
                'trainer.user',
                'bookings',
            ])
            ->orderBy('date')
            ->orderBy('start_time')
            ->limit(5)
            ->get()
            ->map(function ($lesson) {
                $bookingsCount = $lesson->bookings->count();
                $maxParticipants = $lesson->max_participants;
                $percentage = $this->calculatePercentage($bookingsCount, $maxParticipants);

                return [
                    'model' => $lesson,
                    'title' => $lesson->title,
                    'day' => $lesson->date->format('d'),
                    'month' => $lesson->date->translatedFormat('M'),
                    'time' => $this->formatTimeRange($lesson->start_time, $lesson->end_time),
                    'trainer' => $this->formatTrainerName($lesson),
                    'bookings' => "{$bookingsCount}/{$maxParticipants} " . __('general.booked'),
                    'percentage' => round($percentage),
                    'badgeClass' => $this->getLessonBadgeClass($bookingsCount, $maxParticipants, $percentage),
                    'badgeText' => $this->getLessonBadgeText($bookingsCount, $maxParticipants, $percentage),
                ];
            });
    }

    public function getStatsCards(): array
    {
        $totalUsers = $this->getTotalUsers();
        $activeCustomers = $this->getActiveCustomers();
        $totalTrainers = $this->getTotalTrainers();
        $scheduledLessons = $this->getScheduledLessons();
        $currentBookings = $this->getTodayBookings();
        $yesterdayBookings = $this->getYesterdayBookings();

        $bookingsTrend = $this->getPercentageTrend($currentBookings, $yesterdayBookings);

        $currentMonthRevenue = $this->getCurrentMonthRevenue();
        $previousMonthRevenue = $this->getPreviousMonthRevenue();
        $revenueTrend = $this->getPercentageTrend($currentMonthRevenue, $previousMonthRevenue);

        return [
            $this->makeLiveStatCard(
                label: __('kpi.users'),
                value: $totalUsers,
                icon: 'fas fa-users'
            ),

            $this->makeLiveStatCard(
                label: __('kpi.members'),
                value: $activeCustomers,
                icon: 'fas fa-user-check'
            ),

            $this->makeLiveStatCard(
                label: __('kpi.trainers'),
                value: $totalTrainers,
                icon: 'fas fa-dumbbell'
            ),

            $this->makeLiveStatCard(
                label: __('kpi.scheduled_classes'),
                value: $scheduledLessons,
                icon: 'fas fa-calendar-days'
            ),

            $this->makeTrendStatCard(
                label: __('kpi.bookings'),
                value: $currentBookings,
                icon: 'fas fa-clipboard-list',
                trend: $bookingsTrend,
                description: __('kpi.compared')
            ),

            $this->makeTrendStatCard(
                label: __('kpi.revenue'),
                value: $this->formatCurrency($currentMonthRevenue),
                icon: 'fas fa-euro-sign',
                trend: $revenueTrend,
                description: __('kpi.compared_last_month'),
                rawValue: $currentMonthRevenue
            ),
        ];
    }

    public function getRevenueChartData(): array
    {
        return collect(range(0, 11))
            ->reverse()
            ->map(function (int $monthsAgo) {
                $month = now()->subMonths($monthsAgo);

                return [
                    'label' => $month->translatedFormat('M Y'),
                    'revenue' => $this->getRevenueForMonth($month),
                ];
            })
            ->values()
            ->toArray();
    }

    public function getLatestUsers(): Collection
    {
        return $this->usersWithRole('customer')
            ->with([
                'activeSubscription.subscriptionPlan',
                'activeInsurancePolicy',
            ])
            ->latest()
            ->take(5)
            ->get()
            ->map(function (User $user) {
                $subscription = $user->activeSubscription;
                $insurance = $user->activeInsurancePolicy;

                return [
                    'model' => $user,
                    'name' => trim($user->name . ' ' . ($user->surname ?? '')),
                    'initials' => strtoupper(substr($user->name, 0, 1) . substr($user->surname ?? '', 0, 1)),
                    'mail' => $user->email,
                    'role' => trans_choice('auth.customer', 1),

                    'plan' => $subscription?->subscriptionPlan?->name ?? __('general.not_available'),
                    'insurance' => $insurance?->policy_number ?? __('general.not_available'),

                    'planBadgeClass' => $subscription
                        ? 'dashboard-badge-success'
                        : 'dashboard-badge-danger',

                    'planBadgeText' => $subscription
                        ? __('general.active_plan')
                        : __('general.no_active_plan'),

                    'insuranceBadgeClass' => $insurance
                        ? 'dashboard-badge-success'
                        : 'dashboard-badge-danger',

                    'insuranceBadgeText' => $insurance
                        ? __('general.active_insurance')
                        : __('general.no_active_insurance'),
                ];
            });
    }

    private function getTotalUsers(): int
    {
        return User::where(function (Builder $query) {
            $query->whereHas('role', function (Builder $query) {
                $query->where('slug', 'customer');
            })
                ->orWhereNull('role_id');
        })->count();
    }

    private function getActiveCustomers(): int
    {
        return $this->usersWithRole('customer')
            ->where('status', User::STATUS_ACTIVE)
            ->count();
    }

    private function usersWithRole(string $roleSlug): Builder
    {
        return User::whereHas('role', function (Builder $query) use ($roleSlug) {
            $query->where('slug', $roleSlug);
        });
    }

    private function getTotalTrainers(): int
    {
        return Trainer::count();
    }

    private function getScheduledLessons(): int
    {
        return Lesson::upcoming()
            ->scheduled()
            ->count();
    }

    private function getTodayBookings(): int
    {
        return Booking::whereDate('created_at', today())->count();
    }

    private function getYesterdayBookings(): int
    {
        return Booking::whereDate('created_at', Carbon::yesterday())->count();
    }

    private function makeLiveStatCard(string $label, int|float|string $value, string $icon): array
    {
        return [
            'label' => $label,
            'value' => $value,
            'icon' => $icon,
            'valueClass' => $this->getStatValueClass($value),
            'url' => '#',
            'trend' => __('kpi.live'),
            'trendClass' => 'dashboard-stat-trend-success',
            'description' => __('kpi.updated_now'),
        ];
    }

    private function makeTrendStatCard(
        string $label,
        int|float|string $value,
        string $icon,
        int $trend,
        string $description,
        int|float|null $rawValue = null
    ): array {
        return [
            'label' => $label,
            'value' => $value,
            'icon' => $icon,
            'valueClass' => $this->getStatValueClass($rawValue ?? $value),
            'url' => '#',
            'trend' => $this->formatTrend($trend),
            'trendClass' => $this->getTrendClass($trend),
            'description' => $description,
        ];
    }

    private function getStatValueClass(int|float|string $value): string
    {
        if (is_numeric($value) && (float) $value === 0.0) {
            return 'dashboard-stat-value dashboard-stat-value-danger';
        }

        return 'dashboard-stat-value';
    }

    private function getLessonBadgeClass(int $bookingsCount, int $maxParticipants, float $percentage): string
    {
        if ($maxParticipants > 0 && $bookingsCount >= $maxParticipants) {
            return 'dashboard-badge-danger';
        }

        if ($percentage >= 80) {
            return 'dashboard-badge-warning';
        }

        return 'dashboard-badge-success';
    }

    private function getLessonBadgeText(int $bookingsCount, int $maxParticipants, float $percentage): string
    {
        if ($maxParticipants > 0 && $bookingsCount >= $maxParticipants) {
            return __('lesson.complete');
        }

        $availableSpots = max($maxParticipants - $bookingsCount, 0);

        if ($percentage >= 80) {
            return trans_choice('lesson.available_spots', $availableSpots, ['count' => $availableSpots]);
        }

        return __('lesson.available');
    }

    private function calculatePercentage(int|float $current, int|float $total): float
    {
        if ($total <= 0) {
            return 0;
        }

        return min(($current / $total) * 100, 100);
    }

    private function getPercentageTrend(int|float $current, int|float $previous): int
    {
        if ($previous == 0 && $current == 0) {
            return 0;
        }

        if ($previous == 0 && $current > 0) {
            return 100;
        }

        return (int) round((($current - $previous) / $previous) * 100);
    }

    private function getTrendClass(int $trend): string
    {
        if ($trend > 0) {
            return 'dashboard-stat-trend-success';
        }

        if ($trend === 0) {
            return 'dashboard-stat-trend-neutral';
        }

        return 'dashboard-stat-trend-danger';
    }

    private function formatTrend(int $trend): string
    {
        if ($trend > 0) {
            return "+{$trend}%";
        }

        return "{$trend}%";
    }

    private function formatCurrency(float $amount): string
    {
        return '€ ' . number_format($amount, 2, ',', '.');
    }

    private function formatTimeRange(string $startTime, string $endTime): string
    {
        return substr($startTime, 0, 5) . ' - ' . substr($endTime, 0, 5);
    }

    private function formatTrainerName(Lesson $lesson): string
    {
        return trim(
            ($lesson->trainer?->user?->name ?? '') . ' ' .
                ($lesson->trainer?->user?->surname ?? '')
        ) ?: __('general.not_available');
    }

    private function getCurrentMonthRevenue(): float
    {
        return $this->getRevenueForMonth(now());
    }

    private function getPreviousMonthRevenue(): float
    {
        return $this->getRevenueForMonth(now()->subMonth());
    }

    private function getRevenueForMonth(Carbon $month): float
    {
        return $this->getRegistrationRevenueForMonth($month)
            + $this->getSubscriptionRevenueForMonth($month)
            + $this->getLessonBookingRevenueForMonth($month)
            + $this->getServiceBookingRevenueForMonth($month)
            + $this->getEntryPackageRevenueForMonth($month)
            + $this->getStandaloneInsuranceRevenueForMonth($month);
    }

    private function getRegistrationRevenueForMonth(Carbon $month): float
    {
        return RegistrationPayment::where('status', RegistrationPayment::STATUS_PAID)
            ->whereMonth('paid_at', $month->month)
            ->whereYear('paid_at', $month->year)
            ->sum('amount');
    }

    private function getSubscriptionRevenueForMonth(Carbon $month): float
    {
        return Subscription::active()
            ->whereMonth('start_date', $month->month)
            ->whereYear('start_date', $month->year)
            ->sum('price');
    }

    private function getLessonBookingRevenueForMonth(Carbon $month): float
    {
        return Booking::whereNull('subscription_id')
            ->whereIn('status', [
                Booking::STATUS_CONFIRMED,
                Booking::STATUS_COMPLETED,
            ])
            ->whereMonth('created_at', $month->month)
            ->whereYear('created_at', $month->year)
            ->sum('price');
    }

    private function getServiceBookingRevenueForMonth(Carbon $month): float
    {
        return ServiceBooking::where('payment_status', ServiceBooking::PAYMENT_PAID)
            ->whereMonth('created_at', $month->month)
            ->whereYear('created_at', $month->year)
            ->sum('price');
    }

    private function getEntryPackageRevenueForMonth(Carbon $month): float
    {
        return EntryPackage::where('payment_status', EntryPackage::PAYMENT_PAID)
            ->whereMonth('created_at', $month->month)
            ->whereYear('created_at', $month->year)
            ->sum('price');
    }

    private function getStandaloneInsuranceRevenueForMonth(Carbon $month): float
    {
        return InsurancePolicy::active()
            ->where('payment_source', InsurancePolicy::PAYMENT_SOURCE_STANDALONE)
            ->whereMonth('paid_at', $month->month)
            ->whereYear('paid_at', $month->year)
            ->sum('price');
    }
}
