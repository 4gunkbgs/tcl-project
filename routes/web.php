<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomAuthController;


//AuthController
Route::get('home', [CustomAuthController::class, 'dashboard']); 
Route::get('/', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

//HomeController
Route::get('/todo', [HomeController::class, 'todo'])->name('todo');
Route::post('/todo', [HomeController::class, 'todoStore']);
Route::patch('/todo/update', [HomeController::class, 'todoUpdate'])->name('todo.update');