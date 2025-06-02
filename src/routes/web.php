<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// 一覧画面
Route::get('/products', [ProductController::class, 'index']);

// 商品登録
Route::get('/products/register', [ProductController::class, 'create'])->name('products.create');

// 商品検索
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

// 商品更新
Route::put('/products/{productId}/update', [ProductController::class, 'update'])->name('products.update');

// 商品削除
Route::delete('/products/{productId}/delete', [ProductController::class, 'destroy'])->name('products.destroy');

// 商品詳細
Route::get('/products/{productId}', [ProductController::class, 'show'])->name('products.show');