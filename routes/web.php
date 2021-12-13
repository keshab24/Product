<?php

use App\Models\Info;
use App\Models\Product;
use App\Models\Education;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $data['about'] = Info::orderBy('created_at', 'desc')->get();
    $data['edu'] = Education::orderBy('created_at', 'desc')->get();

    return view('dashboard',$data);
})->name('dashboard');
Route::post('/store',[\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::delete('/destroy/{id}',[\App\Http\Controllers\ProductController::class, 'store'])->name('product.destroy');

Route::get('/edit/{id}',[\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');

Route::post('/editProduct/{id}',[\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');


Route::patch('product-update-status', [App\Http\Controllers\ProductController::class, 'updateProductStatus'])->name('product.status');

Route::patch('product-feedback/{id}', [App\Http\Controllers\ProductController::class, 'editf'])->name('product.feedback');