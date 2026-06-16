<?php

namespace Database\Seeders;

use App\Models\Lesson\Lesson;
use App\Models\Trainer\Trainer;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /*
    |--------------------------------------------------------------------------
    | Legacy Lesson Seeder
    |--------------------------------------------------------------------------
    |
    | This seeder creates individual lessons with a specific date.
    | It has been temporarily retained as a historical reference, but it is no longer
    | invoked by the DatabaseSeeder because lesson generation is now handled through
    | LessonTemplateSeeder + the gym:generate-lessons command.
    |
    | Current workflow:
    | LessonTemplateSeeder creates the recurring rules.
    | GenerateRecurringLessons generates the actual lessons in the calendar.
    |
    */
    /*
    |--------------------------------------------------------------------------
    | Legacy Lesson Seeder
    |--------------------------------------------------------------------------
    |
    | Questo seeder crea lezioni singole con una data specifica.
    | È stato mantenuto temporaneamente come riferimento storico, ma non viene più
    | richiamato dal DatabaseSeeder perché la generazione delle lezioni avviene ora
    | tramite LessonTemplateSeeder + comando gym:generate-lessons.
    |
    | Flusso attuale:
    | LessonTemplateSeeder crea le regole ricorrenti.
    | GenerateRecurringLessons genera le lezioni reali in calendario.
    |
    */


    public function run(): void
    {
        $trainers = Trainer::all();

        if ($trainers->isEmpty()) {
            return;
        }

        $lessons = [
            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'High Total Body',
                'description' => 'Lezione di allenamento ad alta intensità per migliorare la forza e la resistenza attraverso esercizi a corpo libero e con attrezzi',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::MONDAY)->toDateString(),
                'start_time' => '9:30:00',
                'end_time' => '10:30:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'High Total Body',
                'description' => 'Lezione di allenamento ad alta intensità per migliorare la forza e la resistenza attraverso esercizi a corpo libero e con attrezzi',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::MONDAY)->toDateString(),
                'start_time' => '18:30:00',
                'end_time' => '19:30:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'High Total Body',
                'description' => 'Lezione di allenamento ad alta intensità per migliorare la forza e la resistenza attraverso esercizi a corpo libero e con attrezzi',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::MONDAY)->toDateString(),
                'start_time' => '20:30:00',
                'end_time' => '21:30:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'Ginnastica Dolce',
                'description' => 'Lezione di ginnastica dolce per migliorare la mobilità e la flessibilità attraverso esercizi a basso impatto',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::MONDAY)->toDateString(),
                'start_time' => '10:30:00',
                'end_time' => '11:30:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'Pilates',
                'description' => 'Lezione di Pilates per migliorare la forza del core, la flessibilità e la postura attraverso esercizi a corpo libero e con attrezzi',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::MONDAY)->toDateString(),
                'start_time' => '19:30:00',
                'end_time' => '20:30:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'High Total Body',
                'description' => 'Lezione di allenamento ad alta intensità per migliorare la forza e la resistenza attraverso esercizi a corpo libero e con attrezzi',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::WEDNESDAY)->toDateString(),
                'start_time' => '9:30:00',
                'end_time' => '10:30:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'High Total Body',
                'description' => 'Lezione di allenamento ad alta intensità per migliorare la forza e la resistenza attraverso esercizi a corpo libero e con attrezzi',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::WEDNESDAY)->toDateString(),
                'start_time' => '18:30:00',
                'end_time' => '19:30:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'High Total Body',
                'description' => 'Lezione di allenamento ad alta intensità per migliorare la forza e la resistenza attraverso esercizi a corpo libero e con attrezzi',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::WEDNESDAY)->toDateString(),
                'start_time' => '20:30:00',
                'end_time' => '21:30:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'Ginnastica Dolce',
                'description' => 'Lezione di ginnastica dolce per migliorare la mobilità e la flessibilità attraverso esercizi a basso impatto',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::WEDNESDAY)->toDateString(),
                'start_time' => '10:30:00',
                'end_time' => '11:30:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'Pilates',
                'description' => 'Lezione di Pilates per migliorare la forza del core, la flessibilità e la postura attraverso esercizi a corpo libero e con attrezzi',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::WEDNESDAY)->toDateString(),
                'start_time' => '19:30:00',
                'end_time' => '20:30:00',
                'requires_insurance' => true,
            ],


            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'High Total Body',
                'description' => 'Lezione di allenamento ad alta intensità per migliorare la forza e la resistenza attraverso esercizi a corpo libero e con attrezzi',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::FRIDAY)->toDateString(),
                'start_time' => '9:30:00',
                'end_time' => '10:30:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'High Total Body',
                'description' => 'Lezione di allenamento ad alta intensità per migliorare la forza e la resistenza attraverso esercizi a corpo libero e con attrezzi',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::FRIDAY)->toDateString(),
                'start_time' => '18:30:00',
                'end_time' => '19:30:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'High Total Body',
                'description' => 'Lezione di allenamento ad alta intensità per migliorare la forza e la resistenza attraverso esercizi a corpo libero e con attrezzi',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::FRIDAY)->toDateString(),
                'start_time' => '20:30:00',
                'end_time' => '21:30:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'Ginnastica Dolce',
                'description' => 'Lezione di ginnastica dolce per migliorare la mobilità e la flessibilità attraverso esercizi a basso impatto',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::FRIDAY)->toDateString(),
                'start_time' => '10:30:00',
                'end_time' => '11:30:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'Pilates',
                'description' => 'Lezione di Pilates per migliorare la forza del core, la flessibilità e la postura attraverso esercizi a corpo libero e con attrezzi',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::FRIDAY)->toDateString(),
                'start_time' => '19:30:00',
                'end_time' => '20:30:00',
                'requires_insurance' => true,
            ],
        ];

        foreach ($lessons as $lesson) {
            Lesson::updateOrCreate(
                [
                    'title' => $lesson['title'],
                    'date' => $lesson['date'],
                    'start_time' => $lesson['start_time'],
                ],
                $lesson
            );
        }
    }
}
