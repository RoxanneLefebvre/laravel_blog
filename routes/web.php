<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\localisationController;

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


Route::get('blog', [blogPostController::class, 'index'])->name('blog.index')->middleware('auth');
Route::get('blog/{blogPost}', [blogPostController::class, 'show'])->name('blog.show')->middleware('auth');
Route::get('blog-create', [blogPostController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('blog-create', [blogPostController::class, 'store'])->middleware('auth'); // pas besoin de nom 
Route::get('blog-edit/{blogPost}', [blogPostController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::put('blog-edit/{blogPost}', [blogPostController::class, 'update'])->middleware('auth');
Route::delete('blog-edit/{blogPost}', [blogPostController::class, 'destroy'])->middleware('auth');


Route::get('query', [blogPostController::class, 'query']);
Route::get('page', [blogPostController::class, 'page']);




Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentification'])->name('user.auth');

Route::get('registration', [CustomAuthController::class, 'create'])->name('user.create');
Route::post('registration', [CustomAuthController::class, 'store'])->name('user.store');

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('forgot-password', [CustomAuthController::class, 'forgotPassword'])->name('forgot.pass');
Route::post('forgot-password', [CustomAuthController::class, 'tempPassword'])->name('temp.pass');
Route::get('new-password/{user}/{tempPassword}', [CustomAuthController::class, 'newPassword'])->name('new.pass');


Route::get('/lang/{locale}', [localisationController::class, 'index'])->name('lang');
