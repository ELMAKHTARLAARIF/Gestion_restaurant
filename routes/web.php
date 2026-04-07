<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuItemController;

use PHPUnit\Framework\MockObject\Generator\MockClass;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use Illuminate\Routing\RouteUri;
use Illuminate\View\View;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\AuthController;


Route::get('/auth/google', [SocialController::class, 'redirect']);
Route::get('/auth/google/callback', [SocialController::class, 'callback']);

Route::get('/', function () {
    return view('Auth.login');
})->name('login');
Route::get('signup', function () {
    return View('Auth.signup');
})->name('signup');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/register', [AuthController::class, 'store'])->name('store');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');


Route::middleware(['auth', 'admin',])->group(function () {

    Route::post('/Product/create', [MenuItemController::class, 'create'])->name('create');

Route::get('/Dashboard', [AdminController::class, 'dashboard'])->name('Dashboard');
    Route::get('Add/Item', function () {
        return View('Admin.addProduit');
    })->name('AddItem');
    Route::get('/Items', [MenuItemController::class, 'show'])->name('show_items');
    Route::get('/Reservations', [AdminController::class, 'ShowReservationsPage'])->name('admin.reservations');
});

Route::middleware(['auth', 'role:customer,waiter,cooker'])->group(function () {
    Route::get('/reservation', [ReservationController::class, 'ShowReservationForm'])->name('reservation');
    Route::post('/reservation/create', [ReservationController::class, 'MakeReservation'])->name('reservation_create');

    Route::post('/contact', [ContactMessageController::class, 'Send'])->name('contact');
    Route::get('/home', [MenuItemController::class, 'show'])->name('home');
    Route::post('/stripe-intent', [OrderController::class, 'createPaymentIntent'])->name('stripe.intent');

    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/menu', [MenuItemController::class, 'show'])->name('menu');
});
