<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\OrderRecipesController;
use App\Http\Controllers\Api\V1\ReportController;




Route::apiResource('/v1/order', OrderController::class)->only(['index','store','update'])->middleware('auth:sanctum');
Route::apiResource('/v1/order/recipe', OrderRecipesController::class)->only(['update'])->middleware('auth:sanctum');
Route::apiResource('/v1/report', ReportController::class)->only(['index'])->middleware('auth:sanctum');

//=================


Route::post('login',[App\Http\Controllers\Api\LoginController::class,'login']);
