<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/sell-property-store', [HomeController::class, 'store'])->name('sell.property.store');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
