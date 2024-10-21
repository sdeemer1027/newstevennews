<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample data into foodcategories table
        DB::table('foodcategories')->insert([
            ['name' => 'Appetizers'],
            ['name' => 'Beverages'],
            ['name' => 'Breads'],
            ['name' => 'Breakfast'],
            ['name' => 'Desserts'],
            ['name' => 'Main Dishes'],
            ['name' => 'Salads'],
            ['name' => 'Sandwiches'],
            ['name' => 'Sauces, Condiments & Dressings'],
            ['name' => 'Side Dishes'],
            ['name' => 'Snacks'],
            ['name' => 'Soups & Stews'],
        ]);
    }
}
