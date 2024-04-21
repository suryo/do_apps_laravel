<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DeliveryOrderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/deliveryorders', [DeliveryOrderController::class, 'index']);
Route::post('/deliveryorders/{id}/approve', [DeliveryOrderController::class, 'approve']);
Route::post('/deliveryorders/{id}/reject', [DeliveryOrderController::class, 'reject']);
Route::post('/deliveryorders/{id}/revisi', [DeliveryOrderController::class, 'revisi']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
