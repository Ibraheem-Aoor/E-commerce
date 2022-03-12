<?php

namespace Database\Factories;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = SubCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->name().'-slug',
            'category_id' => $this->faker->numberBetween(1,500),
        ];
    }
}
