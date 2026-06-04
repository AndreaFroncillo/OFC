<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [

            [
                'name' => 'Personal Training',
                'slug' => Service::CATEGORY_PERSONAL_TRAINING,
                'price' => 30.00,
                'category' => Service::CATEGORY_EXTRA,
                'duration_minutes' => 60,
                'requires_trainer' => true,
                'requires_insurance' => true,
                'description' => 'Allenamento individuale con personal trainer.',
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 1,
            ],

            [
                'name' => 'Nutrizione',
                'slug' => Service::CATEGORY_NUTRITION,
                'price' => 80.00,
                'category' => Service::CATEGORY_EXTRA,
                'duration_minutes' => 60,
                'requires_trainer' => false,
                'requires_insurance' => false,
                'description' => 'Consulenza nutrizionale personalizzata.',
                'is_active' => false,
                'is_visible' => false,
                'sort_order' => 2,
            ],

            [
                'name' => 'Terapie Strumentali Riabilitative',
                'slug' => Service::CATEGORY_REHABILITATION,
                'price' => 35.00,
                'category' => Service::CATEGORY_EXTRA,
                'duration_minutes' => 45,
                'requires_trainer' => false,
                'requires_insurance' => false,
                'description' => 'Seduta di terapia strumentale riabilitativa.',
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 3,
            ],

            [
                'name' => 'Ginnastica Posturale e Correttiva',
                'slug' => Service::CATEGORY_POSTURAL,
                'price' => 25.00,
                'category' => Service::CATEGORY_EXTRA,
                'duration_minutes' => 60,
                'requires_trainer' => true,
                'requires_insurance' => true,
                'description' => 'Percorso personalizzato per postura e mobilità.',
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 4,
            ],

            [
                'name' => 'Massoterapia',
                'slug' => Service::CATEGORY_THERAPY,
                'price' => 40.00,
                'category' => Service::CATEGORY_EXTRA,
                'duration_minutes' => 45,
                'requires_trainer' => false,
                'requires_insurance' => false,
                'description' => 'Trattamento massoterapico.',
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 5,
            ],

            [
                'name' => 'Preparazione Fisica per Concorsi',
                'slug' => Service::CATEGORY_PREPARATION_COMPETITION,
                'price' => 35.00,
                'category' => Service::CATEGORY_EXTRA,
                'duration_minutes' => 60,
                'requires_trainer' => true,
                'requires_insurance' => true,
                'description' => 'Preparazione atletica specifica per concorsi.',
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 6,
            ],

            [
                'name' => 'Analisi Composizione Corporea (BIA)',
                'slug' => Service::CATEGORY_BODY_COMPOSITION_ANALYSIS,
                'price' => 20.00,
                'category' => Service::CATEGORY_EXTRA,
                'duration_minutes' => 30,
                'requires_trainer' => false,
                'requires_insurance' => false,
                'description' => 'Analisi della composizione corporea tramite BIA.',
                'is_active' => false,
                'is_visible' => false,
                'sort_order' => 7,
            ],

            [
                'name' => 'Massaggi',
                'slug' => Service::CATEGORY_MASSAGE,
                'price' => 20.00,
                'category' => Service::CATEGORY_EXTRA,
                'duration_minutes' => 30,
                'requires_trainer' => false,
                'requires_insurance' => false,
                'description' => 'Massaggio terapeutico.',
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 8,
            ],

        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}
