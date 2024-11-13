<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class CreateImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            [
               'foto'=>'some-url-to-a-photo',
               'name'=>'-',
            ],
        ];

        foreach ($images as $key => $image) {
            Image::create($image);
        }
    }
}
