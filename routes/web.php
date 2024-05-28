<?php

use App\Http\Controllers\UserLoginCT;
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
    return view('welcome', [
        "title" => "Login Page"
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        "title" => "Dashboard"
    ]);
});

Route::get('/login', function () {
    return view('login', [
        "title" => "Login"
    ]);
});

Route::get('/login', [UserLoginCT::class, 'index']);
Route::post('/login', [UserLoginCT::class, 'authenticate']);

Route::get('/car-units', function () {
    return view('car-units', [
        "title" => "Car Units",
        "deskripsi" => "Menambahkan unit mobil baru dan mobil investor ke database"
    ]);
});

Route::get('/car-recommend', function () {
    return view('car-recommend', [
        "title" => "Car Recomendations",
    ]);
});

Route::get('/data-promo', function () {
    return view('data-promo', [
        "title" => "Data Promo",
    ]);
});

Route::get('/new-post', function () {
    return view('new-post', [
        "title" => "Vechile Post",
    ]);
});

Route::get('/transaksi-customer', function () {
    return view('transaksi-customer', [
        "title" => "Transaksi Customer",
    ]);
});

Route::get('/data-customer', function () {
    return view('data-customer', [
        "title" => "Data Customer",
    ]);
});

Route::get('/order-history', function () {
    return view('order-history', [
        "title" => "Order History",
    ]);
});