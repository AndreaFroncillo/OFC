<?php

namespace App\Services\Dashboard;

use App\Models\Lesson\Lesson;

class AdminDashboardService
{
    public function getNextLessons()
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
                $percentage = $maxParticipants > 0
                    ? min(($bookingsCount / $maxParticipants) * 100, 100)
                    : 0;

                return [
                    'model' => $lesson,
                    'title' => $lesson->title,
                    'day' => $lesson->date->format('d'),
                    'month' => $lesson->date->translatedFormat('M'),
                    'time' => substr($lesson->start_time, 0, 5) . ' - ' . substr($lesson->end_time, 0, 5),
                    'trainer' => trim(($lesson->trainer?->user?->name ?? '') . ' ' . ($lesson->trainer?->user?->surname ?? '')) ?: __('general.not_available'),
                    'bookings' => "{$bookingsCount}/{$maxParticipants} " .  __('general.booked'),
                    'percentage' => round($percentage),
                    'badgeClass' => $this->getLessonBadgeClass($bookingsCount, $maxParticipants, $percentage),
                    'badgeText' => $this->getLessonBadgeText($bookingsCount, $maxParticipants, $percentage),
                ];
            });
    }

    private function getLessonBadgeClass(int $bookingsCount, int $maxParticipants, float $percentage): string
    {
        if ($bookingsCount >= $maxParticipants) {
            return 'dashboard-badge-danger';
        }

        if ($percentage >= 80) {
            return 'dashboard-badge-warning';
        }

        return 'dashboard-badge-success';
    }

    private function getLessonBadgeText(int $bookingsCount, int $maxParticipants, float $percentage): string
    {
        if ($bookingsCount >= $maxParticipants) {
            return __('lesson.complete');
        }

        $availableSpots = max($maxParticipants - $bookingsCount, 0);

        if ($percentage >= 80) {
            return trans_choice('lesson.available_spots', $availableSpots, ['count' => $availableSpots]);
        }

        return __('lesson.available');
    }
}
