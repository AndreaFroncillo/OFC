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
