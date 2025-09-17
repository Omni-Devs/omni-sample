<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class SubcategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(), // auto-create parent category
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(6),
        ];
    }
}
