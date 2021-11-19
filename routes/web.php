<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $data['about'] = Product::orderBy('created_at', 'desc')->get();

    return view('dashboard',$data);
})->name('dashboard');
Route::post('/store',[\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::delete('/destroy/{id}',[\App\Http\Controllers\ProductController::class, 'store'])->name('product.destroy');

Route::patch('product-update-status', [App\Http\Controllers\ProductController::class, 'updateProductStatus'])->name('product.status');