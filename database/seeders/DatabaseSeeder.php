<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(700)->create();
        \App\Models\Category::factory(800)->create();
        \App\Models\Product::factory(5000)->create();
        \App\Models\SubCategory::factory(500)->create();
        \App\Models\Review::factory(100)->create();
    }
}
