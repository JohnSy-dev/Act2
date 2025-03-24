<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
 
 
 
 // Authentication routes
 Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');
 Route::post('/login', [UserAuthController::class, 'login']);
 Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
 
 Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('register');
 Route::post('/register', [UserAuthController::class, 'register']);
 
 // Protected Dashboard
 Route::get('/', [StudentsController::class, 'index'])->middleware('auth')->name('std.index');

// STUDENTS ROUTES
Route::get('/', [StudentsController::class, 'index'])->name('std.index');
Route::post('/create-student', [StudentsController::class, 'newStudent'])->name('std.create');
Route::post('/create-student', [StudentsController::class, 'newStudent'])->name('std.create');
Route::get('/student/edit/{id}', [StudentsController::class, 'edit'])->name('std.edit');
Route::delete('/student/delete/{id}', [StudentsController::class, 'destroy'])->name('std.delete');
Route::put('/student/update/{id}', [StudentsController::class, 'update'])->name('std.update');