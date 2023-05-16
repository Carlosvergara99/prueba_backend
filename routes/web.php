<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/',[App\Http\Controllers\PrizeController::class, 'index'] )->middleware('auth');
Route::post('/update/prize',[App\Http\Controllers\PrizeController::class, 'update'] )->middleware('auth');
Route::post('/create/prize',[App\Http\Controllers\PrizeController::class, 'create'] )->middleware('auth');
Route::post('/edit/prize',[App\Http\Controllers\PrizeController::class, 'edit'] )->middleware('auth');
