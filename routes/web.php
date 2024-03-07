<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;            use App\Models\User;
use App\Http\Controllers\ProductController;         use App\Models\Product;
use App\Http\Controllers\LeadController;         use App\Models\Lead;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get  ('/user/create',        [UserController::class,'create']);
Route::get  ('/user/delete/{id}',   [UserController::class, 'delete']);
Route::get  ('/user/edit/{id}',     [UserController::class, 'edit']);
Route::post ('/user/update/{id}',   [UserController::class, 'update']);
Route::post ('/user/store',         [UserController::class,'store']);
Route::get  ('/user/index',         [UserController::class, 'index']);

Route::get  ('/product/create',     [ProductController::class,'create']);
Route::get  ('/product/index',      [ProductController::class, 'index']);
Route::get  ('/product/delete/{id}',[ProductController::class, 'delete']);
Route::get  ('/product/edit/{id}',  [ProductController::class, 'edit']);
Route::get  ('/product/view/{id}',  [ProductController::class, 'view']);
Route::post ('/product/update/{id}',[ProductController::class, 'update']);
Route::post ('/product/store',      [ProductController::class, 'store']);
Route::post ('/search/product',     [ProductController::class, 'search']);

Route::get  ('/lead/create',        [LeadController::class, 'create']);
Route::get  ('/lead/index',         [LeadController::class, 'index']);
Route::get  ('/lead/edit/{id}',     [LeadController::class, 'edit']);
Route::get  ('/lead/delete/{id}',   [LeadController::class, 'delete']);
Route::post ('/lead/update/{id}',   [LeadController::class, 'update']);
Route::post ('/lead/store',         [LeadController::class, 'store']);
