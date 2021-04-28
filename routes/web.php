<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models;
use App\Models\Products;

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

Route::get('/products', 'App\Http\Controllers\ProductsController@showAll');
Route::get('/products/search', 'App\Http\Controllers\ProductsController@search');
// Route::get('/products', function(){
//     $prod = Products::getAll();
//     return $prod;
// });
Route::get('/', function () {
    return view('welcome');
});
