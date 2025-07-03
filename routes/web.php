<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

use function Pest\Laravel\get;

// [ok] read all products

Route::get("/products", [ProductController::class, 'readAllProducts']);

// [ok] create products 

Route::post("/products", [ProductController::class, 'createProduct']);

// [ok] read product by id

Route::get("/products/{id}", [ProductController::class, 'readProductById']);

// [] update product


// [] update product price only


// [] delete product

Route::get('/create', [ProductController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
