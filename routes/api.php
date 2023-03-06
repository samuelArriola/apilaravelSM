<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\index_user_controller;
use  App\Http\Controllers\inex_dependencia_controller;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('inex_user', [index_user_controller::class, 'index']);
Route::post('inex_user', [index_user_controller::class, 'store']);
Route::get('inex_user/{id}', [index_user_controller::class, 'edit']);
Route::delete('inex_user/{id}', [index_user_controller::class, 'destroy']);

Route::get('inex_dependencias',[inex_dependencia_controller::class, 'index']);
Route::post('inex_dependencias',[inex_dependencia_controller::class, 'store']);
Route::put('inex_dependencias/{id}',[inex_dependencia_controller::class, 'update']);