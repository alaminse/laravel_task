<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth Route START
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
    Route::get('registration', [AuthController::class, 'registration'])->name('register');
    Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
    Route::get('/', [AuthController::class, 'dashboard']);
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
// Auth Route END

    Route::get('user/list', [ProfileController::class, 'userList'])->name('users.list');
    Route::get('user/profile/{id}', [ProfileController::class, 'profile'])->name('user.profile');
    Route::get('profile/create/', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('profile/store/', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('user/details/{id}', [ProfileController::class, 'userDetails'])->name('user.details');
