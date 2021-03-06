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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [App\Http\Controllers\ClientesController::class, 'index']);

Route::resource('/', App\Http\Controllers\ClientesController::class);//! C23
Route::resource('/clientes', App\Http\Controllers\ClientesController::class);//! Cgarm
Route::resource('/registro', App\Http\Controllers\ClientesController::class);//! C24
Route::resource('/cursos', App\Http\Controllers\CursosController::class);//! C28
