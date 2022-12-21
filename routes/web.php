<?php

use App\Http\Controllers\ActionLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.home');
    })->name('dashboard');

    //for category
    Route::post('category/create',[CategoryController::class,'createCategory'])->name('admin#createCategory');
    Route::get('show/category',[CategoryController::class,'showCategory'])->name('admin#showCategory');
    Route::get('delete/category/{id}',[CategoryController::class,'deleteCategory'])->name('admin#deleteCategory');

    //for userList
    Route::get('userList',[ActionLogController::class,'userList'])->name('admin#userList');
    Route::get('userList/delete/{id}',[ActionLogController::class,'deleteUserList'])->name('admin#deleteUserList');

    // for postlist
    Route::get('postList',[PostController::class,'postList'])->name('admin#postList');
    Route::post('post/create',[PostController::class,'postCreate'])->name('admin#postCreate');
    Route::get('show/post',[PostController::class,'showPost'])->name('admin#showPost');
    Route::get('delete/post/{id}',[PostController::class,'deletePost'])->name('admin#deletePost');

    //for order
    Route::get('order',[OrderController::class,'orderPage'])->name('admin#order');
    Route::post('order/state/{id}',[OrderController::class,'orderState'])->name('admin#state');
    Route::get('order/code/{code}',[OrderController::class,'orderCode'])->name('admin#orderCode');
});
