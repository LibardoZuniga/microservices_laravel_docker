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

        $store = DB::table('item_store_logs')
                ->select('items.name','item_store_logs.*')
                ->join('items', 'items.id', '=', 'item_store_logs.id_item');

        if($request->date){
            $store->whereBetween('item_store_logs.created_at', [$request->date.' 00:00:00', $request->date.' 23:59:59']);
        }

        
        $field = array(
            array('key' => 'name','label' => 'Ingrediente',  'sorteable' => true),
            array('key' => 'created_at', 'label' => 'Fecha compra', 'sorteable' => true),
            array('key' => 'quantity', 'label' => 'Cantidad comprada', 'sorteable' => true),
        );

        return   array('fields' => $field, 'data' => $store->get());
    }

    
}
