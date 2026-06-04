<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'trainer',
                'slug' => 'trainer',
            ],
            [
                'name' => 'customer',
                'slug' => 'customer',
            ]
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['slug' => $role['slug']],
                $role
            );
            /* $roleModel = new \App\Models\Role($role);

            dd(
                class_uses_recursive($roleModel),
                method_exists($roleModel, 'bootHasUuid')
            ); */
        }

            
    }
}
