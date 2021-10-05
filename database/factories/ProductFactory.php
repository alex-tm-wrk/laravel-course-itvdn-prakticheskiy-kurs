<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->numerify('Product ###'),
            'description' => $this->faker->paragraph(4, true),
            'price' => $this->faker->randomFloat(2, 10, 999),
            'barcode' => $this->faker->ean8(),
            'stock' => $this->faker->numberBetween(0, 999),
            'cover' => 'https://loremflickr.com/640/480/computer',
        ];
    }
}
