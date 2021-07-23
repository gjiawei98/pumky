<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Models\Merchant;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resources([
        'customer' => CustomerController::class,
        'sales' => SalesController::class,
        'category' => CategoryController::class,
        'product' => ProductController::class,
        'merchant' => MerchantController::class,
    ]);

    Route::get('/get_product/{product_id}',[SalesController::class,'get_product'])->name('get_product');
});
