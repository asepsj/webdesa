<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Home;

class CreateHomesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homes = [
            [
               'image'=>'some-url-to-a-photo',
               'title'=>'Home',
               'content'=>'aaaaaaaaaaaaaa'
            ],
        ];

        foreach ($homes as $key => $home) {
            Home::create($home);
        }
    }
}
