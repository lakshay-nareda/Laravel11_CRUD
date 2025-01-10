<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StuController;

Route::get('/students', [StuController::class, 'index'])->name('students.index');
Route::post('/students', [StuController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', [StuController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StuController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StuController::class, 'destroy'])->name('students.destroy');



Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
