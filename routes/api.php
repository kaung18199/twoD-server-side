<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\MakeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// login
Route::post('user/login',[AuthController::class,'userLogin']);
Route::post('user/register',[AuthController::class,'userRegister']);

Route::get('category/get',[MakeController::class,'getCategory']);

// for post
Route::post('user/post',[PostController::class,'userPost']);
Route::get('user/getPost',[PostController::class,'userGetPost']);
//post search
Route::post('post/search',[PostController::class,'postSearch']);
//post detail
Route::post('post/detail',[PostController::class,'postDetail']);

//for comment
Route::post('comment/create',[CommentController::class,'commentCreate']);
Route::post('comment/get',[CommentController::class,'commentGet']);

// for cart
Route::post('cart/create',[CartController::class,'cartCreate']);
Route::post('cart/get',[CartController::class,'cartGet']);
Route::post('cart/delete',[CartController::class,'cartDelete']);
Route::post('cart/confirm',[CartController::class,'cartConfirm']);

// for orderList
Route::post('cart/orderList',[CartController::class,'orderListCreate']);
Route::post('order/get',[CartController::class,'orderGet']);
Route::post('order/detail',[CartController::class,'orderDetail']);
