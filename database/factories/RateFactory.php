<?php

namespace Database\Factories;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
        protected $model = Rate::class;
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1,100),
            'stars' => $this->faker->numberBetween(0,5),
        ];
    }
}
