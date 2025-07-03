<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

use function Pest\Laravel\get;


Route::get('/teste', [ProductController::class, 'index'])->name("teste");


// [ok] read all products

Route::get("/products", [ProductController::class, 'readAllProducts'])->name("products.read");

// [ok] create products 

Route::get("/products/create", [ProductController::class, 'createProduct'])->name("products.create");

Route::post("/products/insert", [ProductController::class, 'insertProduct'])->name("products.insert");

// [ok] read product by id

Route::get("/products/{id}", [ProductController::class, 'readProductById'])->name("products.read");

// [] update product


// [] update product price only


// [] delete product

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
