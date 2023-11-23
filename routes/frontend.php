<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/property/view/{id}', [HomeController::class, 'propertyView'])->name('propertyView');
Route::post('/sell-property-store', [HomeController::class, 'store'])->name('sell.property.store');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
