<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CustomAuthController;

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

Route::get('blog', [blogPostController::class, 'index'])->name('blog.index');
Route::get('blog/{blogPost}', [blogPostController::class, 'show'])->name('blog.show');
Route::get('blog-create', [blogPostController::class, 'create'])->name('blog.create');
Route::post('blog-create', [blogPostController::class, 'store']); // pas besoin de nom 
Route::get('blog-edit/{blogPost}', [blogPostController::class, 'edit'])->name('blog.edit');
Route::put('blog-edit/{blogPost}', [blogPostController::class, 'update']);
Route::delete('blog-edit/{blogPost}', [blogPostController::class, 'destroy']);


Route::get('query', [blogPostController::class, 'query']);
Route::get('page', [blogPostController::class, 'page']);



Route::get('login', [CustomAuthController::class, 'index'])->name('user.index');
Route::post('login', [CustomAuthController::class, 'authentification'])->name('user.auth');

Route::get('registration', [CustomAuthController::class, 'create'])->name('user.create');
Route::post('registration', [CustomAuthController::class, 'store'])->name('user.store');

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');
