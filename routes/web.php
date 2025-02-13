<?php

use App\Http\Controllers\Backoffice\BookController as BackofficeBookController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/libros', [BookController::class, 'index'])->name('books.index');
Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [BackofficeBookController::class, 'index'])->name('dashboard');
    Route::get('/books/create', [BackofficeBookController::class, 'create'])->name('books.create');
});

require __DIR__ . '/auth.php';
