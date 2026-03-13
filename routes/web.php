<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use PHPUnit\Framework\MockObject\Generator\MockClass;
use App\Http\Controllers\AuthController;
use Illuminate\View\View;

Route::get('/', function () {
    return view('Auth.login');
})->name('login');
Route::get('signup', function () {
    return View('Auth.signup');
})->name('signup');
Route::get('Dashboard',function(){
    return View('Admin.dashboard');
})->name('Dashboard');
Route::get('Add/Item',function(){
    return View('Admin.addProduit');
})->name('AddItem');

Route::post('/register', [AuthController::class, 'store'])->name('store');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');