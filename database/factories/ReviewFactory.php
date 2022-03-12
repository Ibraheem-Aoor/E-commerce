<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->name(4500),
            'rating' => $this->faker->numberBetween(1,5),
            'order_item_id' => 500,
        ];
    }
}
