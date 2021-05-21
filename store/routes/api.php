<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\StoreController;
use App\Http\Controllers\Api\V1\ReportController;


Route::apiResource('/v1/store', StoreController::class)->only(['index','update'])->middleware('auth:sanctum');
Route::apiResource('/v1/report', ReportController::class)->only(['index'])->middleware('auth:sanctum');
//=================
Route::post('login',[App\Http\Controllers\Api\LoginController::class,'login']);
