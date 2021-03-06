<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\ShoppingCart;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\PaymentOrder;
use App\Models\Order;

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

Route::get('/', WelcomeController::class);

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');

Route::get('orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');

Route::get('orders/create', CreateOrder::class)->name('orders.create')->middleware('auth');

Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show')->middleware('auth');
//Route::get('orders', [OrderController::class, 'show'])->name('orders.show');

Route::get('orders/{order}/payment', PaymentOrder::class)->name('orders.payment')->middleware('auth');
//Route::get('/payment', [OrderController::class, 'payment'])->name('orders.payment');


/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/

