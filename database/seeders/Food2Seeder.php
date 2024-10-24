
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Food2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert sample data into foods table
        DB::table('foods')->insert([



]);

foreach (array_chunk($foods, 100) as $batch) {
DB::table('foods')->insert($batch);
}



}
}
