<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

// STUDENTS ROUTES
Route::get('/', [StudentsController::class, 'index'])->name('std.index');
Route::post('/create-student', [StudentsController::class, 'newStudent'])->name('std.create');
Route::post('/create-student', [StudentsController::class, 'newStudent'])->name('std.create');
Route::get('/student/edit/{id}', [StudentsController::class, 'edit'])->name('std.edit');
Route::delete('/student/delete/{id}', [StudentsController::class, 'destroy'])->name('std.delete');
Route::put('/student/update/{id}', [StudentsController::class, 'update'])->name('std.update');