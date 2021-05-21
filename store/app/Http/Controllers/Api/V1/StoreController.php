<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Items;
use App\Models\ItemStoreLogs;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Items::query();

        $order = DB::table('items')
                    ->select('items.*');

        if($request->recipe){
            $items = $items->join('recipe_items', 'items.id', '=', 'recipe_items.id_item')
                    ->where('recipe_items.id_recipe', $request->recipe)
                    ->select('items.*','recipe_items.id as id_recipe_item','recipe_items.quantity as quantity_recipe');
        }

        return $items->get();
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

        $Items = Items::find($id);
        $quantity = 0;
        if($request->buy){
            
            try {
                $client = new \GuzzleHttp\Client();
                $response = $client->get('https://recruitment.alegra.com/api/farmers-market/buy', ['query' => ["ingredient" => $Items->name]]);

                if ($response->getStatusCode() == 200) {
                    $quantity =  (int)json_decode($response->getBody()->getContents())->quantitySold;
                    if($quantity>0){
                        $Items->quantity = (int)$Items->quantity + $quantity;
                        $Items->save();
    
                        $ItemStoreLogs = new ItemStoreLogs;
                        $ItemStoreLogs->id_item = $id;
                        $ItemStoreLogs->quantity = $quantity;
                        $ItemStoreLogs->save();
    
                        return response()->json($Items, 200);
                    }
                }
            } catch (\Exception $e) {
                \Log::error($e->getMessage());
            }
        }else if($request->quantity){
            $Items->quantity = (int)$Items->quantity - $request->quantity;
            $Items->save();
            return response()->json($Items, 200);

        }
        


        return response()->json([
            'message' => 'shopping error'
        ], 400);
    }
}
