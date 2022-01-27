<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RatesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1,100),
            'stars' => $this->faker->numberBetween(0,5),
        ];
    }
}
