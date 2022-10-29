<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/chirps', ChirpController::class)
->only(['index','store'])
->only(['index', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth','verified']);

Route::resource('products',\App\Http\Controllers\ProductController::class)
    ->only(['index','show','create','store','destroy','edit','update'])
    ->middleware(['auth','verified']);

// /* Route::resource('/products', InventarioController::class)
// ->only(['index','store'])
// ->only(['index', 'store', 'edit', 'update', 'destroy'])
// ->middleware(['auth','verified']); */


// Route::get('/products/index', [ProductController::class, 'index'])->name('products.index');

// Route::get('/products/create', function(){
//     return view('products.create');
// })->name('products.create');


// // Route::get('/user', [UserController::class, 'index']);
// Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

// Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Route::patch('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');

// Route::get('/products/destroy/${id}', [ProductController::class, 'destroy'])->name('products.destroy');

// // Route::resource('products', 'ProductController');
// // Route::resource('products',\App\Http\Controllers\ProductController::class)
// //     ->only(['index','show','create','store','destroy','edit','update'])
// //     ->middleware(['auth','verified']);    


require __DIR__.'/auth.php';
