<?php

namespace App\Console\Commands;

use App\Models\Lesson\Lesson;
use App\Models\Lesson\LessonTemplate;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateRecurringLessons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gym:generate-lessons {--weeks=8}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate recurring lessons from active lesson templates';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $weeks = (int) $this->option('weeks');

        if ($weeks <= 0) {
            $this->error('The weeks option must be greater than 0.');

            return self::FAILURE;
        }

        $templates = LessonTemplate::active()
            ->ordered()
            ->get();

        if ($templates->isEmpty()) {
            $this->warn('No active lesson templates found.');

            return self::SUCCESS;
        }

        $created = 0;
        $updated = 0;

        foreach ($templates as $template) {
            for ($week = 0; $week < $weeks; $week++) {
                $lessonDate = $this->calculateLessonDate(
                    weekday: $template->weekday,
                    weekOffset: $week
                );

                if ($this->lessonDateTimeIsPast($lessonDate, $template->start_time)) {
                    continue;
                }

                $lesson = Lesson::updateOrCreate(
                    [
                        'lesson_template_id' => $template->id,
                        'date' => $lessonDate->toDateString(),
                        'start_time' => $template->start_time,
                    ],
                    [
                        'trainer_id' => $template->trainer_id,
                        'title' => $template->title,
                        'description' => $template->description,
                        'category' => $template->category,
                        'price' => $template->price,
                        'max_participants' => $template->max_participants,
                        'status' => Lesson::STATUS_SCHEDULED,
                        'is_bookable' => $template->is_bookable,
                        'end_time' => $template->end_time,
                        'requires_insurance' => $template->requires_insurance,
                    ]
                );

                $lesson->wasRecentlyCreated
                    ? $created++
                    : $updated++;
            }
        }

        $this->info("Recurring lessons generated successfully.");
        $this->line("Created: {$created}");
        $this->line("Updated: {$updated}");

        return self::SUCCESS;
    }

    private function calculateLessonDate(int $weekday, int $weekOffset): Carbon
    {
        $startOfWeek = now()
            ->startOfWeek(Carbon::MONDAY)
            ->addWeeks($weekOffset);

        return $startOfWeek->copy()->addDays($weekday - 1);
    }

    private function lessonDateTimeIsPast(Carbon $lessonDate, string $startTime): bool
    {
        $lessonDateTime = Carbon::parse(
            $lessonDate->toDateString() . ' ' . $startTime
        );

        return $lessonDateTime->isPast();
    }
}
