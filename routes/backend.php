<?php

use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::get('get-users',[UserController::class,'index'])->name('users');

