<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('get-users',[UserController::class,'index'])->name('users');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'] )->name('user.store');



Route::get('/get-transaction',[TransactionController::class,'index'])->name('get.transaction');



Route::get('/get-order',[OrderController::class,'index'])->name('get.order');



//Property
Route::get('properties', [PropertyController::class, 'index'])->name('show-property');
