<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@palestra.it'],
            [
                'name' => __('roles.admin'),
                'surname' => 'Palestra',
                'role_id' => Role::where('slug', 'admin')->first()->id,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]
        );
    }
}
