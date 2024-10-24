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
            ['id'=> '1', 'name' => 'Appetizers'],
            ['id'=> '2', 'name' => 'Beverages'],
            ['id'=> '3', 'name' => 'Breads'],
            ['id'=> '4', 'name' => 'Breakfast'],
            ['id'=> '5', 'name' => 'Desserts'],
            ['id'=> '6', 'name' => 'Main Dishes'],
            ['id'=> '7', 'name' => 'Salads'],
            ['id'=> '8', 'name' => 'Sandwiches'],
            ['id'=> '9', 'name' => 'Sauces, Condiments & Dressings'],
            ['id'=> '10', 'name' => 'Side Dishes'],
            ['id'=> '11', 'name' => 'Snacks'],
            ['id'=> '12', 'name' => 'Soups & Stews'],
        ]);
    }
}
