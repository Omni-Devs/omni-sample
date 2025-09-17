<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
        {
            return [
                'code' => $this->faker->unique()->randomNumber(),
                'name' => $this->faker->word(),
                'price' => $this->faker->randomFloat(2, 50, 2000),
                'category_id' => Category::factory(),
                'subcategory_id' => Subcategory::factory()->create(),
            ];
        }
}