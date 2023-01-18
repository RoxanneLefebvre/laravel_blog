<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;

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