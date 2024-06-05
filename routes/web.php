<?php

use App\Http\Controllers\CarUnitsCT;
use App\Http\Controllers\UserLoginCT;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarRecomendsCT;

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
    return redirect('/login');
});

Route::get('/login', [UserLoginCT::class, 'index'])->name('login');
Route::post('/login', [UserLoginCT::class, 'authenticate']);

// Melindungi rute dengan middleware auth
Route::middleware(['auth', 'admin'])->group(function () {
    // Rute-rute yang hanya bisa diakses oleh admin
    Route::get('/dashboard', function () {
        return view('dashboard', ["title" => "Dashboard"]);
    });

/** Routes yang mengakses car units **/
    Route::get('/car-units', function () {
        return view('car-units', [
            "title" => "Car Units",
        ]);
    });
    Route::post('/car-units', [CarUnitsCT::class, 'addCar'])->name('car.addCar');
    Route::put('/cars/{car}', [CarUnitsCT::class, 'update'])->name('cars.update'); // Pastikan rute ini ada
    Route::delete('/cars/{car}', [CarUnitsCT::class, 'destroy'])->name('cars.destroy');
    Route::get('/car-units', [CarUnitsCT::class, 'index'])->name('car.index');    

/** End Routes car units **/

/** Routes Car Recommend **/
    Route::get('/car-recommendations', function () {
        return view('car-recommendations', [
            "title" => "Car Recommendations",
        ]);
    });
    Route::get('/car-recommendations', [CarRecomendsCT::class, 'index'])->name('car_recomend.index');
    Route::post('/car-recommendations/add', [CarRecomendsCT::class, 'addCarRecomend'])->name('car_recomend.add');
    Route::delete('/car-recommendations/remove/{id}', [CarRecomendsCT::class, 'removeCarRecomend'])->name('car_recomend.remove');


/** End Routes Car Recommend **/

/** Routes Data Promo **/
    Route::get('/data-promo', function () {
        return view('data-promo', [
            "title" => "Data Promo",
        ]);
    });

/** End Routes Data Promo **/

/** Routes New Post **/
    // Route::get('/new-post', function () {
    //     return view('new-post', [
    //         "title" => "Vehicle Post",
    //     ]);
    // });

/** End Routes New Post **/

/** Routes Transaksi Customer **/
    Route::get('/transaksi-customer', function () {
        return view('transaksi-customer', [
            "title" => "Transaksi Customer",
        ]);
    });
    
/** Routes Transaksi Customer **/

/** Routes Data Customer **/
    Route::get('/data-customer', function () {
        return view('data-customer', [
            "title" => "Data Customer",
        ]);
    });

/** Routes Data Customer **/

/** Routes Order Histori **/
    Route::get('/order-history', function () {
        return view('order-history', [
            "title" => "Order History",
        ]);
    });


/** End Routes Order Histori **/


    Route::post('/logout', [UserLoginCT::class, 'logout'])->name('logout');

});