<?php

use App\Http\Controllers\ProductsController;
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

Route::get('/', [ProductsController::class, 'index'])->name('products.index');
Route::get('/details', [ProductsController::class, 'get_details'])->name('products.details');
Route::post('/update', [ProductsController::class, 'update_product_form'])->name('products.update');
Route::post('/update_data', [ProductsController::class, 'update'])->name('products.update_data');
Route::delete('/delete', [ProductsController::class, 'delete_product'])->name('products.delete');