<?php

use App\Http\Controllers\UserProfileController;
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

Route::get('/', [\App\Http\Controllers\PageController::class, 'index'])->name('index');

Route::view('/home', 'home')->middleware('auth')->name('home');

Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile.show');
Route::put('/user/profile-information', [UserProfileController::class, 'profileInformationUpdate'])->name('profile.update');
Route::put('/user/password', [UserProfileController::class, 'passwordUpdate'])->name('user-password.update');
Route::delete('/user/delete', [UserProfileController::class, 'destroy'])->name('profile.destroy');

Route::resource('/catalog', \App\Http\Controllers\CatalogController::class)->parameters([
    'catalog' => 'slug'
]);

Route::prefix('cart')->group(function () {
    Route::get('/', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::get('add/{productId}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::patch('update', [\App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::get('drop/{productId}', [\App\Http\Controllers\CartController::class, 'drop'])->name('cart.drop');
    Route::get('delete', [\App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('checkout', [\App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('checkout', [\App\Http\Controllers\CartController::class, 'store'])->name('order.store');
    Route::get('success/{orderId}', [\App\Http\Controllers\CartController::class, 'success'])->name('order.success');
});

Route::resource('/orders', \App\Http\Controllers\OrderController::class)->only([
    'store', 'show', 'update', 'destroy'
]);;
