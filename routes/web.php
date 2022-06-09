<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;

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

//authentication route

Route::get('/' , [IndexController::class , 'index']);
Route::get('/articles' , [ArticlesController::class , 'articles']);
Route::get('/orders' , [OrderController::class , 'index']);
//Categories Route
Route::get('/categories/create' , [CategoryController::class , 'create'])->name('create');
Route::get('/categories' , [CategoryController::class , 'index'])->name('categories');
Route::get('/categories/{category}' , [CategoryController::class , 'show'])->name('show');
Route::get('/categories/edit/{category}' , [CategoryController::class , 'edit'])->name('edit');
Route::get('/categories/destroy/{category}' , [CategoryController::class , 'destroy'])->name('destroy');
//
Route::post('/categories/store' , [CategoryController::class , 'store'])->name('store');
Route::put('/categories/update/{category}' , [CategoryController::class , 'update'])->name('update');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
