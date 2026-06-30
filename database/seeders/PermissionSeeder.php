<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            // Users
            [
                'group' => 'users',
                'name' => 'Visualizzare Utenti',
                'slug' => 'users.read',
            ],
            [
                'group' => 'users',
                'name' => 'Creare Utenti',
                'slug' => 'users.create',
            ],
            [
                'group' => 'users',
                'name' => 'Modificare Utenti',
                'slug' => 'users.update',
            ],
            [
                'group' => 'users',
                'name' => 'Eliminare Utenti',
                'slug' => 'users.delete',
            ],

            // Trainers
            [
                'group' => 'trainers',
                'name' => 'Visualizzare Trainers',
                'slug' => 'trainers.read',
            ],
            [
                'group' => 'trainers',
                'name' => 'Creare Trainers',
                'slug' => 'trainers.create',
            ],
            [
                'group' => 'trainers',
                'name' => 'Modificare Trainers',
                'slug' => 'trainers.update',
            ],
            [
                'group' => 'trainers',
                'name' => 'Eliminare Trainers',
                'slug' => 'trainers.delete',
            ],

            // Lessons
            [
                'group' => 'lessons',
                'name' => 'Visualizzare Lezioni',
                'slug' => 'lessons.read',
            ],
            [
                'group' => 'lessons',
                'name' => 'Creare Lezioni',
                'slug' => 'lessons.create',
            ],
            [
                'group' => 'lessons',
                'name' => 'Modificare Lezioni',
                'slug' => 'lessons.update',
            ],
            [
                'group' => 'lessons',
                'name' => 'Eliminare Lezioni',
                'slug' => 'lessons.delete',
            ],

            // Services
            [
                'group' => 'services',
                'name' => 'Visualizzare Servizi',
                'slug' => 'services.read',
            ],
            [
                'group' => 'services',
                'name' => 'Creare Servizi',
                'slug' => 'services.create',
            ],
            [
                'group' => 'services',
                'name' => 'Modificare Servizi',
                'slug' => 'services.update',
            ],
            [
                'group' => 'services',
                'name' => 'Eliminare Servizi',
                'slug' => 'services.delete',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['slug' => $permission['slug']],
                $permission
            );
        }

        $adminRole = Role::where('slug', 'admin')->first();

        if ($adminRole) {
            $adminRole->permissions()->syncWithoutDetaching(
                Permission::pluck('id')
            );
        }
    }
}
