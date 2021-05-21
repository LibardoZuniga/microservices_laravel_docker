<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\V1\ReportResource;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $order = DB::table('order_recipes')
            ->select('orders.*', 'recipes.id AS id_recipe', 'recipes.name', 'order_recipes.id as order_recipes_id', 'order_recipes.status as status_recipe')
            ->join('orders', 'orders.id', '=', 'order_recipes.id_order')
            ->join('recipes', 'recipes.id', '=', 'order_recipes.id_recipe');

        if ($request->date) {
            $order->whereBetween('orders.created_at', [$request->date . ' 00:00:00', $request->date . ' 23:59:59']);
        }

        $field = array(
            array('key' => 'id','label' => 'Codio pedido',  'sorteable' => true),
            array('key' => 'status','label' => 'estado', 'sorteable' => true),
            array('key' => 'created_at', 'label' => 'fecha creacion', 'sorteable' => true),
            array('key' => 'name', 'label' => 'nombre plato', 'sorteable' => true),
        );

        return   array('fields' => $field, 'data' => $order->get());
    }
}
