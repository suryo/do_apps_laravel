<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DeliveryOrderController;

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



Route::get('/', [LandingController::class, 'index'])->name('landing');


Route::resource('brands', BrandController::class);
Route::resource('product-categories', ProductCategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('carts', CartController::class);
Route::post('/carts/clear', [CartController::class,'clear'])->name('carts.clear');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/check-delivery-order',  [CheckoutController::class,'CheckDeliveryOrder'])->name('checkout.CheckDeliveryOrder');
Route::post('/checkout/saveDraft', [CheckoutController::class, 'saveDraft'])->name('checkout.saveDraft');
Route::post('/checkout/submitApproval', [CheckoutController::class, 'submitApproval'])->name('checkout.submitApproval');

Route::get('/deliveryorders', [DeliveryOrderController::class, 'index'])->name('deliveryorders.index');
Route::get('/deliveryorders/{order}', [DeliveryOrderController::class,'show'])->name('deliveryorders.show');
Route::put('/deliveryorders/{order}/approve', [DeliveryOrderController::class,'approve'])->name('deliveryorders.approve');


Route::get('/product/{id}', [LandingController::class, 'product_detail'])->name('product.detail');