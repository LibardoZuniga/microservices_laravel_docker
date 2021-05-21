<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OrderRecipes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_order',
        'id_recipe',
        'created_at',
    ];


    public function createMassive($quantity,$order_id)
    {
        $recipe =  Recipes::pluck('id')->toArray();
        $orderRecipes = [];
        for ($i = 0; $i < (int)$quantity; $i++) {
            $orderRecipes[] = array('id_order' => $order_id, 'id_recipe' => array_rand($recipe, 1));
        }
        $response = OrderRecipes::insert($orderRecipes);

        return $response;
    }
}
