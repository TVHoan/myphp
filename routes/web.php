<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\admin\DashboardController;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostPublic;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified','admin'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/product', ProductsController::class);
Route::resource('/category', CategoryController::class)->middleware(['auth', 'verified','admin']);
Route::resource('/post', PostController::class)->middleware(['auth', 'verified','admin']);
Route::get('/posts/{slug}', [PostPublic::class,'detail']);

