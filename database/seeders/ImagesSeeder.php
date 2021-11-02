<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::all()->each(function ($gallery) {
            $images = Image::factory()
               ->count(4)
                ->create();
            $gallery->images()->saveMany($images);
        });
    }
}
