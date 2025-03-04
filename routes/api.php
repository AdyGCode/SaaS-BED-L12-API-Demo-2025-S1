<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\ProjectController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(["prefix"=>"v1",], function(){
    Route::apiResource('projects', ProjectController::class)
        ->only(['index','show']);
});

Route::group(["prefix"=>"v2",], function(){
    Route::apiResource('projects', ProjectController::class)
        ->except(['index','show']);
});

