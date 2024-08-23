<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users = [
            [
                'name' => 'raffa',
                'password' => Hash::make('39097456'), // password
                'email' => 'ranaldoraffaele@gmail.com'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
