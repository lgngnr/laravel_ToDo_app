<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'save']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'index'])->name('logout');

Route::get('/posts', function () {
    return view('posts.index');
})->name('posts');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/post', [PostController::class, 'add'])->name('post.add');
Route::delete('/post/{post}', [PostController::class, 'delete'])->name('post.delete');

Route::post('/post/{post}/like', [PostLikeController::class, 'like'])->name('post.like');
Route::delete('/post/{post}/unlike', [PostLikeController::class, 'unlike'])->name('post.unlike');
