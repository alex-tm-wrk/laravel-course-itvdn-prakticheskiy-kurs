<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gallery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => null,
//            'photos' => serialize(
//                [
//                    "0" => "https://loremflickr.com/640/480/computer",
//                    "1" => "https://loremflickr.com/640/480/computer",
//                    "2" => "https://loremflickr.com/640/480/computer",
//                    "3" => "https://loremflickr.com/640/480/computer"
//                ]
//            ),
        ];
    }
}
