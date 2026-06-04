<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'mario.rossi@example.com'],
            [
                'name' => 'Mario',
                'surname' => 'Rossi',
                'role_id' => Role::where('slug', 'trainer')->first()->id,
                'password' => Hash::make('password'),
            ]
        );

        Trainer::updateOrCreate(
            ['user_id' => $user->id],
            [
                'is_available' => true,
            ]
        );
    }
}
