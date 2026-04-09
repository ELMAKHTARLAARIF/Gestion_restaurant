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
    Route::get('/Infos', [AdminController::class, 'ShowRestaurantInfo'])->name('Restaurant_Info');
    Route::get('/reservation/accept/{id}', [ReservationController::class, 'accept'])->name('admin.reservation.accept');
    Route::get('/reservation/cancel/{id}', [ReservationController::class, 'cancel'])->name('admin.reservations.cancel');
    Route::get('/reservation/delete/{id}', [ReservationController::class, 'delete'])->name('admin.reservation.delete');
    Route::get('/Orders', [OrderController::class, 'Show'])->name('admin.orders');
    // gestion menu 
    Route::get('{id}/edit', [MenuItemController::class, 'edit'])->name('menu.edit');
    Route::put('{id}', [MenuItemController::class, 'update'])->name('update');
    Route::delete('{id}', [MenuItemController::class, 'destroy'])->name('menu.destroy');
    Route::post('{id}/toggle', [MenuItemController::class, 'toggle'])->name('menu.toggle');
});

Route::middleware(['auth', 'role:customer,waiter,cooker'])->group(function () {
    Route::get('/reservation', [ReservationController::class, 'ShowReservationForm'])->name('reservation');
    Route::post('/reservation/create', [ReservationController::class, 'MakeReservation'])->name('reservation_create');

    Route::post('/contact', [ContactMessageController::class, 'Send'])->name('contact');
    Route::get('/home', [MenuItemController::class, 'show'])->name('home');
    Route::post('/order/payment-intent', [OrderController::class, 'createPaymentIntent']);
    Route::post('/order/store', [OrderController::class, 'store']);
    Route::get('/menu', [MenuItemController::class, 'show'])->name('menu');
});
