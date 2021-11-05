<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTransactionController;
use App\Http\Controllers\TransactionController;
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

Auth::routes([
    'register' => false
]);

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    // Route::delete('product-transaction', [ProductTransactionController::class, 'destroy'])->name('product-transaction.destroy');
    
    Route::resource('products', ProductController::class);

    Route::resource('transactions', TransactionController::class);

    Route::resource('product_transactions', ProductTransactionController::class);

});
