<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Super Admin',
                'email'          => 'superadmin@doyelmetal.com',
                'password'       => bcrypt('pa55w0rdX'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'General Admin',
                'email'          => 'admin@doyelmetal.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Manager',
                'email'          => 'manager@doyelmetal.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
