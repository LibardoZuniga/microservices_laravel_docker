<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('recipes')->insert([
            ['name' => 'pollo en salsa roja'],
            ['name' => 'Solomillo  a la cerveza'],
            ['name' => 'Torrejas de arroz'],
            ['name' => 'Pupusas '],
            ['name' => 'Chalupas'],
            ['name' => 'Picadillo de pollo']
        ]);
    }
}
