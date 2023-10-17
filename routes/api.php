<?php

use App\Http\Controllers\PrestadorController;
use App\Http\Controllers\ImportController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/prestadores', 'App\Http\Controllers\PrestadorController@store');
Route::get('/prestadores','App\Http\Controllers\PrestadorController@index');
Route::get('/prestadores/{id}','App\Http\Controllers\PrestadorController@show');

Route::post('/import', 'App\Http\Controllers\ImportController@importCSV');

Route::delete('/prestadores/{id}', 'App\Http\Controllers\PrestadorController@destroy');

