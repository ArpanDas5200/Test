<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/register', [AdminController::class, 'registerView'])->name('register-view');
Route::post('/register', [AdminController::class, 'register'])->name('register');

Route::get('/login', [AdminController::class, 'loginView'])->name('login-view');
Route::post('/login', [AdminController::class, 'login'])->name('login');

Route::middleware(['session'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/get-users', [DashboardController::class, 'getUsers'])->name('get-users');
    Route::get('/add-user', [DashboardController::class, 'addUserView'])->name('add-user-view');
    Route::post('/add-user', [DashboardController::class, 'addUser'])->name('add-user');
    Route::get('/edit-user/{id}', [DashboardController::class, 'editUserView'])->name('edit-user-view');
    Route::post('/update-user', [DashboardController::class, 'updateUser'])->name('update-user');
    Route::post('/delete', [DashboardController::class, 'delete'])->name('delete');
    Route::post('/city-list', [DashboardController::class, 'cityList'])->name('city-list');
});

