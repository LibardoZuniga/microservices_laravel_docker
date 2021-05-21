<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderRecipes;
use Illuminate\Support\Facades\DB;

use App\Models\Recipes;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = DB::table('order_recipes')
            ->select('orders.id','recipes.id AS id_recipe','recipes.name','order_recipes.id as order_recipes_id','order_recipes.status')
            ->join('orders', 'orders.id', '=', 'order_recipes.id_order')
            ->join('recipes', 'recipes.id', '=', 'order_recipes.id_recipe')
            ->where('orders.status', 'preparation')
            ->get();

        return  $order->groupBy('id');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ((int)$request->quantity > 0) {
            $order  = Order::create();
            $OrderRecipes = new OrderRecipes;
            $OrderRecipes->createMassive((int)$request->quantity,$order->id);
            return response()->json($order, 200);
        }

        return response()->json([
            'message' => 'bad request'
        ], 400);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        if ($request->status) {
            $Order = Order::find($id);
            $Order->status = $request->status;
            $Order->save();

            return response()->json($Order, 200);
        }


        return response()->json([
            'message' => 'bad request'
        ], 400);
    }


}
