<?php

use App\Http\Controllers\Backoffice\BookController as BackofficeBookController;
use App\Http\Controllers\Backoffice\CategoryController as BackofficeCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoverImageStreamController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Pantalla principal
Route::inertia('/', 'Welcome')->name('home');

// Rutas al público en general
Route::name('public.')->group(function () {
    Route::get('/libros',            [BookController::class, 'indexPage'])->name('books.index.page');
    Route::get('/libros/{book}',     [BookController::class, 'showPage'])->name('books.show.page');
    Route::get('/books/{book}',      [BookController::class, 'show'])->name('books.show');
    Route::get('/books',             [BookController::class, 'index'])->name('books.index');
    Route::get('/categorias',        [CategoryController::class, 'indexPage'])->name('categories.index.page');
    Route::get('/categories',        [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/covers/{fileName}', CoverImageStreamController::class)->name('image');
});

// Rutas de usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/profile',      [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',    [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',   [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del backoffice
Route::middleware('auth')->name('backoffice.')->prefix('backoffice')->group(function () {
    Route::get('/dashboard',         [BackofficeBookController::class, 'indexPage'])->name('dashboard');
    Route::get('/books',             [BackofficeBookController::class, 'index'])->name('books.index');
    Route::get('/books/create',      [BackofficeBookController::class, 'create'])->name('books.create');
    Route::post('/books',            [BackofficeBookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BackofficeBookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}',      [BackofficeBookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}',   [BackofficeBookController::class, 'destroy'])->name('books.destroy');

    Route::get('/categories-list',        [BackofficeCategoryController::class, 'indexPage'])->name('categories.index.page');
    Route::get('/categories',             [BackofficeCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create',      [BackofficeCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories',            [BackofficeCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{book}/edit', [BackofficeCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{book}',      [BackofficeCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{book}',   [BackofficeCategoryController::class, 'destroy'])->name('categories.destroy');
});

// Rutas de inicio de sesión
require __DIR__ . '/auth.php';
