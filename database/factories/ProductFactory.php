<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'regular_price' => $this->faker->numberBetween(100,300),
            'sale_price' => $this->faker->numberBetween(100,300),
            'SKU' => $this->faker->numberBetween(100,300),
            'quantity' => $this->faker->numberBetween(50,300),
            'image' => 'digital_'.$this->faker->numberBetween(1,22).'.jpg',
            'weight' => $this->faker->randomNumber(),
            'color' => $this->faker->colorName(),
            'dimensions' => $this->faker->serialize(),
            'sub_category_id' => $this->faker->numberBetween(1,500),
        ];
    }
}
