<?php

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

Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');

Route::post('/authenticate', [App\Http\Controllers\HomeController::class, 'authenticate'])->name('authenticate');
Route::get('/logout_user', [App\Http\Controllers\HomeController::class, 'logout_user'])->name('logout_user');

Route::get('/', [App\Http\Controllers\HomeController::class, 'home']);

Route::prefix("admin")->middleware('auth')->group(function () {
    Route::get('', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('admin.index');

    Route::get('bookings', [App\Http\Controllers\BookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/show/{id}', [App\Http\Controllers\BookingController::class, 'show'])->name('bookings.show');

    Route::get('restaurants', [App\Http\Controllers\RestaurantController::class, 'index'])->name('restaurants.index');
    Route::post('restaurants', [App\Http\Controllers\RestaurantController::class, 'store'])->name('restaurants.store');
    Route::get('restaurants/show/{id}', [App\Http\Controllers\RestaurantController::class, 'show'])->name('restaurants.show');
    Route::get('restaurants/create', [App\Http\Controllers\RestaurantController::class, 'create'])->name('restaurants.create');

    Route::get('restaurants/edit/{id}', [App\Http\Controllers\RestaurantController::class, 'edit'])->name('restaurants.edit');
    Route::get('restaurants/delete/{id}', [App\Http\Controllers\RestaurantController::class, 'delete'])->name('restaurants.delete');
});
Route::post("bookings", [App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');
