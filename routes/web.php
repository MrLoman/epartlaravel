<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/delete', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/product/getallproducts', [ProductController::class, 'getallproducts'])->name('product.getallproducts');
Route::get('/product/getallvariations/{variation}', [ProductController::class, 'getallvariations'])->name('product.getallvariations');


Route::get('/product/createvariation', [ProductController::class, 'createvariation'])->name('product.createvariation');
Route::post('/product/createvariation', [ProductController::class, 'storevariation'])->name('variation.storevariation');

Route::get('/product/{variation}/editvariation', [ProductController::class, 'editvariation'])->name('variation.editvariation');
Route::put('/product/{variation}/updatevariation', [ProductController::class, 'updatevariation'])->name('variation.updatevariation');
Route::delete('/product/{variation}/deletevariation', [ProductController::class, 'deletevariation'])->name('variation.deletevariation');
