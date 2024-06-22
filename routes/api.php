<?php

use App\Http\Controllers\CarUnitsCT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginCT; 
use App\Http\Controllers\UserRegisterCT;
use App\Http\Controllers\OrderCT;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarRecomendsCT;
use App\Http\Controllers\OrderHistoryCT;
use App\Http\Controllers\ContentCT;
use App\Http\Controllers\SyaratKetentuanCT;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [UserRegisterCT::class, 'register']);
Route::post('login', [UserLoginCT::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('carunits', [CarUnitsCT::class, 'showApi']);
    Route::post('orders/{car_unit_id}', [OrderCT::class, 'store']);
    Route::delete('order/{order_id}/cancel', [OrderCT::class, 'cancelOrder']);
    Route::delete('orders/{order}/reject', [OrderCT::class, 'reject']);
    Route::get('car-recommendations', [CarRecomendsCT::class, 'index']);
    Route::get('carunits/{id}', [CarUnitsCT::class, 'showApiById']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::get('/users/{id}/transactions', [UserController::class, 'getUserTransactions']);
    Route::get('order-history', [OrderHistoryCT::class, 'index']);
    Route::get('order-history/{userId}', [OrderHistoryCT::class, 'showByUserId']);
    Route::get('/data-content', [ContentCT::class, 'index'])->name('data-content');
    Route::post('/promo/add', [ContentCT::class, 'store'])->name('promo.add');
    Route::get('/terms', [SyaratKetentuanCT::class, 'getTerms']);

    Route::post('/logout', [UserLoginCT::class, 'logout']);
});