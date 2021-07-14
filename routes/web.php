<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\ProductoController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('Practica', function () {
    return view('Practica.practica');
});
Route::get('Boutique_vivi', function () {
    return view('Boutique_vivi.index');
});
Route::get('Cliente', function () {
    return view('Cliente.index');
});
Route::get('Productos', function () {
    return view('Productos.index');
});
Route::get('Ofertas', function () {
    return view('Ofertas.index');
});

Route::resource('Cliente', ClienteController::class, ['names'=> [
    'index' => 'Cliente.index',
    'store' => 'Cliente.new',]
]);

Route::resource('Productos', ProductoController::class, ['names'=> [
    'index'=>'Productos.index',
    'store'=>'Productos.new',]
]);


Route::resource('Ofertas', OfertaController::class, ['names'=> [
    'index'=>'Ofertas.index',
    'store'=>'Ofertas.new',]
]);

