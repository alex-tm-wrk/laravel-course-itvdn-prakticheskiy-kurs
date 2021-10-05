<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
            ->count(120)
            ->create();

        $faker = Factory::create();

        Product::all()->each(function ($product) use ($faker) {
            $product->slug = Str::of($product->title)->slug('-');
            $product->save();

            $categories = array();

            for ($i = 0; $i < 4; $i++) {
                array_push($categories, $faker->numberBetween(1, 5));
            }

            $product->categories()->sync($categories);
        });
    }
}
