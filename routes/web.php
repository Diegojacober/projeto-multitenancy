<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/posts/create',[PostController::class,'create']);
Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::post('/posts/store',[PostController::class, 'store'])->name('posts.store');
Route::put('/posts/edit/{id}',[PostController::class,'update'])->name('posts.update');
Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit');
Route::get('/posts/{id}',[PostController::class,'show'])->name('posts.show');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
