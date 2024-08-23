<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'description' => 'Administrador del sistema'
            ],
            [
                'name' => 'User',
                'description' => 'Usuario del sistema'
            ],
             [
                'name' => 'Visit',
                'description' => 'Usuario Visitante'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
