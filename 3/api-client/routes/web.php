<?php

use App\Http\Controllers\RequestController;
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

Route::get('/', [RequestController::class,'getBarangs']);
Route::get('/view/{id}', [RequestController::class,'getBarang']);
Route::get('/edit/{id}', [RequestController::class,'editBarang']);
Route::post('/tambah', [RequestController::class,'createBarang']);
Route::put('/update', [RequestController::class,'updateBarang']);
Route::delete('/delete', [RequestController::class,'deleteBarang']);
