<?php

use App\Http\Controllers\Backoffice\BookController as BackofficeBookController;
use App\Http\Controllers\Backoffice\CategoryController as BackofficeCategoryController;
use App\Http\Controllers\Backoffice\RoleController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoverImageStreamController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Pantalla principal
Route::inertia('/', 'Welcome')->name('home');

// Rutas al público en general
Route::name('public.')->group(function () {
    Route::get('/libros',                   [BookController::class, 'indexPage'])->name('books.index.page');
    Route::get('/libros/{book}',            [BookController::class, 'showPage'])->name('books.show.page');
    Route::get('/books/{book}',             [BookController::class, 'show'])->name('books.show');
    Route::get('/books',                    [BookController::class, 'index'])->name('books.index');
    Route::get('/categorias',               [CategoryController::class, 'indexPage'])->name('categories.index.page');
    Route::get('/categories',               [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{category}',    [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/covers/{fileName}',        CoverImageStreamController::class)->name('image');
});

// Rutas de usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/profile',      [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',    [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',   [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del backoffice
Route::middleware('auth')->name('backoffice.')->prefix('backoffice')->group(function () {
    Route::get('/books-list',        [BackofficeBookController::class, 'indexPage'])->name('dashboard');
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

    Route::middleware('admin')->group(function () {
        Route::get('/users-list',        [UserController::class, 'indexPage'])->name('users.index.page');
        Route::get('/users',             [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create',      [UserController::class, 'create'])->name('users.create');
        Route::post('/users',            [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{book}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{book}',      [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{book}',   [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/roles-list',        [RoleController::class, 'indexPage'])->name('roles.index.page');
        Route::get('/roles',             [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/create',      [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles',            [RoleController::class, 'store'])->name('roles.store');
        Route::delete('/roles/{book}',   [RoleController::class, 'destroy'])->name('roles.destroy');
    });
});

// Rutas de inicio de sesión
require __DIR__ . '/auth.php';
