<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RecipeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('recipe_items')->insert([
            ['id_recipe' => 1, 'id_item' => 1, 'quantity' => 2],
            ['id_recipe' => 1, 'id_item' => 4, 'quantity' => 1],
            ['id_recipe' => 1, 'id_item' => 5, 'quantity' => 1],
            ['id_recipe' => 1, 'id_item' => 10,'quantity' => 1],
            ['id_recipe' => 2, 'id_item' => 9, 'quantity' => 1],
            ['id_recipe' => 2, 'id_item' => 7, 'quantity' => 2],
            ['id_recipe' => 2, 'id_item' => 4, 'quantity' => 1],
            ['id_recipe' => 2, 'id_item' => 8, 'quantity' => 1],
            ['id_recipe' => 3, 'id_item' => 4, 'quantity' => 1],
            ['id_recipe' => 3, 'id_item' => 6, 'quantity' => 1],
            ['id_recipe' => 3, 'id_item' => 9, 'quantity' => 1],
            ['id_recipe' => 4, 'id_item' => 3, 'quantity' => 2],
            ['id_recipe' => 4, 'id_item' => 6, 'quantity' => 2],
            ['id_recipe' => 4, 'id_item' => 2, 'quantity' => 1],
            ['id_recipe' => 4, 'id_item' => 8, 'quantity' => 1],
            ['id_recipe' => 5, 'id_item' => 9, 'quantity' => 1],
            ['id_recipe' => 5, 'id_item' => 4, 'quantity' => 1],
            ['id_recipe' => 5, 'id_item' => 7, 'quantity' => 1],
            ['id_recipe' => 5, 'id_item' => 1, 'quantity' => 1],
            ['id_recipe' => 6, 'id_item' => 1, 'quantity' => 1],
            ['id_recipe' => 6, 'id_item' => 4, 'quantity' => 1],
            ['id_recipe' => 6, 'id_item' => 10,'quantity' => 1],
            ['id_recipe' => 6, 'id_item' => 3, 'quantity' => 1],
            ['id_recipe' => 6, 'id_item' => 5, 'quantity' => 1],
        ]);
    }
}
