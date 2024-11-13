<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
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
                'name' => 'Asep Saefuddin Zuhri',
                'username' => 'admin',
                'type' => 1,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Asep Saefuddin',
                'username' => 'sadmin',
                'type' => 2,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Asep Zuhri',
                'username' => 'user',
                'type' => 0,
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}