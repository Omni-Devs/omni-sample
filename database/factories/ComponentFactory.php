<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComponentFactory extends Factory
{
    public function definition(): array
    {
        return [
                'name'           => $this->faker->word(),
                'unit'           => $this->faker->randomElement(['kg', 'g', 'ml', 'pcs']),
                'code'           => $this->faker->unique()->word(),
                'cost'           => $this->faker->randomFloat(2, 5, 500),    // between 5.00 and 500.00
                'price'          => $this->faker->randomFloat(2, 50, 2000),  // between 50.00 and 2000.00
                'onhand'         => $this->faker->numberBetween(0, 100),     // stock on hand
                'for_sale'       => $this->faker->boolean(70),               // 70% chance true
                'category_id'    => Category::factory(),
                'subcategory_id' => Subcategory::factory(),                  // don’t call ->create() here
            ];
    }
}
