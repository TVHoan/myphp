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
use App\Http\Controllers\Home;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;


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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);user
// });
Route::get('/', [Home::class,'index'])->name('home');
Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified','admin'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/product', ProductsController::class);
Route::resource('/category', CategoryController::class)->middleware(['auth', 'verified','admin']);
Route::resource('/post', PostController::class)->middleware(['auth', 'verified','admin']);
Route::get('/posts/{slug}', [PostPublic::class,'detail']);

// Route::get('/profile', [ProfileController::class,'index'])->middleware(['auth', 'verified']);
// // Route::post('/profile/{id}/edit', [ProfileController::class,'update'])->middleware(['auth', 'verified'])->name('profile.update');
// Route::post('/profile/store', [ProfileController::class,'store'])->middleware(['auth', 'verified'])->name*('profile.store');
Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index')->name('profile');
    Route::post('/profile', 'store')->name('profile.store');
    Route::post('/profile/update', 'update')->name('profile.update');
});


Route::get('/api/post',[PostPublic::class,'list']) ;
Route::post('/api/comment',[CommentController::class,'create']) ;
Route::post('/api/post',[PostPublic::class,'update']) ;