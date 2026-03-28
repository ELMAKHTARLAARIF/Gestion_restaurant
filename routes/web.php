<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuItemController;

use PHPUnit\Framework\MockObject\Generator\MockClass;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use Illuminate\Routing\RouteUri;
use Illuminate\View\View;

Route::get('/', function () {
    return view('Auth.login');
})->name('login');
Route::get('signup', function () {
    return View('Auth.signup');
})->name('signup');


Route::post('/register', [AuthController::class, 'store'])->name('store');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');


// Route::middleware(['auth', 'admin',])->group(function () {

    Route::get('Dashboard', function () {
        return View('Admin.dashboard');
    })->name('Dashboard');
    Route::get('Add/Item', function () {
        return View('Admin.addProduit');
    })->name('AddItem');
    Route::post('Product/create', [MenuItemController::class, 'create'])->name('create');
    Route::get('Items', [MenuItemController::class, 'show'])->name('show_items');

// });
// Route::middleware(['auth', 'role: customer,waiter,cooker'])->group(function () {
    Route::get('home', [MenuItemController::class, 'show'])->name('home');
    Route::post('Reservation', [ReservationController::class, 'MakeReservation'])->name('reservation');
// });
