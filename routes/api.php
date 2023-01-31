<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('/user/change-name/', [ProfileController::class, 'changeName']);
Route::get('/user/{token}/', [ProfileController::class, 'get']);

Route::get('/post/all/', [PostsController::class, 'getAll']);
Route::post('/post/new/', [PostsController::class, 'create']);
Route::get('/post/{id}/', [PostsController::class, 'get']);

Route::post('/comment/new/', [CommentsController::class, 'create']);
Route::get('/comment/{postId}/', [CommentsController::class, 'get']);

Route::post('/like/', [LikesController::class, 'create']);