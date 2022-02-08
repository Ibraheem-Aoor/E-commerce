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
        \App\Models\User::factory(8000)->create();
        \App\Models\Category::factory(100)->create();
        \App\Models\Product::factory(7000)->create();
        \App\Models\Review::factory(100)->create();
        \App\Models\Rate::factory(100)->create();
    }
}
