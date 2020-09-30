<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Doctor\DoctorProfileController;

use App\Http\Controllers\Admin\DashboardController;


// Website Routes
Route::get('/',[WebsiteController::class, 'index'])->name('home');
Route::get('/login',[WebsiteController::class, 'login'])->name('login');
Route::get('/register',[WebsiteController::class, 'register'])->name('register');
Route::get('/reset',[WebsiteController::class, 'reset'])->name('reset');

Route::get('/denied',[WebsiteController::class, 'denied'])->name('denied');


// Auth Routes
Route::group(['prefix'=>'auth','as'=>'auth.'], function(){
    Route::post('/login',[AuthController::class, 'login'])->name('login');
    Route::post('/register',[AuthController::class, 'register'])->name('register');
    Route::post('/reset',[AuthController::class, 'resetPass'])->name('reset');
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
});


// User Routes
Route::group(['prefix'=>'user','as'=>'user.', 'middleware' => ['auth', 'userPermission']], function(){
    Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
});


// Doctor Routes
Route::group(['prefix'=>'doctor','as'=>'doctor.', 'middleware' => ['auth', 'doctorPermission']], function(){
    Route::get('/dashboard',[DoctorProfileController::class, 'dashboard'])->name('dashboard');
});


// Admin Routes
Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => ['auth', 'adminPermission']], function(){
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
});