<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

use function Pest\Laravel\get;


Route::get('/index', [ProductController::class, 'index'])->name("index");

// [ok] create products 

Route::get("/products/create", [ProductController::class, 'createProduct'])->name("products.create");

Route::post("/products/insert", [ProductController::class, 'insertProduct'])->name("products.insert");

// [ok] read all products

Route::get("/products", [ProductController::class, 'readAllProducts'])->name("products.read");

// [ok] read product by id

Route::get("/products/{id}", [ProductController::class, 'readProductById'])->name("products.read-id");

// [ok] update product

Route::get('/products/edit/{id}', [ProductController::class, 'editProduct'])->name("products.edit");

Route::put('/products/edit/{id}', [ProductController::class, 'updateProduct'])->name("products.update");

// [ok] update product (patch)

Route::patch('/products/edit-price/{id}', [ProductController::class, 'updateProductPrice'])->name("products.edit-price");

Route::patch('/products/edit-quantity/{id}', [ProductController::class, 'updateProductQuantity'])->name("products.edit-quantity");

Route::patch('/products/edit-name/{id}', [ProductController::class, 'updateProductName'])->name("products.edit-name");

// [] delete product

Route::delete('/products/delete/{id}', [ProductController::class, 'deleteProduct'])->name("products.delete");

//_________________________________

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
