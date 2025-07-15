<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'login']);
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('customer', App\Http\Controllers\CustomerController::class);
    Route::resource('service', App\Http\Controllers\ServiceController::class);
    Route::resource('level', App\Http\Controllers\LevelController::class);
    Route::resource('trans', App\Http\Controllers\TransOrderController::class);

   
});    

