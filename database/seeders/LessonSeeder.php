<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Trainer;
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
                'title' => 'Lezione di prova',
                'description' => 'Lezione di prova per testare il sistema',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::MONDAY)->toDateString(),
                'start_time' => '10:00:00',
                'end_time' => '11:00:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'Ginnastica Posturale',
                'description' => 'Lezione di ginnastica posturale per migliorare la postura e prevenire dolori muscolari',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::TUESDAY)->toDateString(),
                'start_time' => '18:00:00',
                'end_time' => '19:00:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'Allenamento Funzionale',
                'description' => 'Lezione di allenamento funzionale per migliorare la forza e la resistenza attraverso esercizi a corpo libero e con attrezzi',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::WEDNESDAY)->toDateString(),
                'start_time' => '17:00:00',
                'end_time' => '18:00:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'Preparazione Atletica',
                'description' => 'Lezione di preparazione atletica per migliorare le prestazioni sportive attraverso esercizi di forza, resistenza e agilità',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::THURSDAY)->toDateString(),
                'start_time' => '19:00:00',
                'end_time' => '20:00:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'Circuit Training',
                'description' => 'Lezione di circuit training per migliorare la forza e la resistenza attraverso una serie di esercizi ad alta intensità eseguiti in rapida successione',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::FRIDAY)->toDateString(),
                'start_time' => '18:00:00',
                'end_time' => '19:00:00',
                'requires_insurance' => true,
            ],

            [
                'trainer_id' => $trainers[0]->id,
                'title' => 'Stretching e Mobilità',
                'description' => 'Lezione di stretching e mobilità per migliorare la flessibilità e la gamma di movimento attraverso esercizi di allungamento e mobilità articolare',
                'category' => 'Fitness',
                'price' => 15.00,
                'max_participants' => 20,
                'status' => Lesson::STATUS_SCHEDULED,
                'is_bookable' => true,
                'date' => Carbon::now()->next(Carbon::SATURDAY)->toDateString(),
                'start_time' => '10:00:00',
                'end_time' => '11:00:00',
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
