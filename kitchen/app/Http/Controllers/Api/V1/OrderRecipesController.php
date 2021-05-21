<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderRecipes;


class OrderRecipesController extends Controller
{
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->status) {
            $Recipe = OrderRecipes::find($id);
            $Recipe->status = $request->status;
            $Recipe->save();

            return response()->json($Recipe, 200);
        }


        return response()->json([
            'message' => 'bad request'
        ], 400);
    }

    
}
