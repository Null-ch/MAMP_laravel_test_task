<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Auth::routes();


Route::post('/v1/register', [App\Http\Controllers\Api\v1\RegisterController::class, 'register']);
Route::post('/v1/login', [App\Http\Controllers\Api\v1\LoginController::class, 'login']);
Route::middleware('auth:api')->post('/v1/getPosts', App\Http\Controllers\Api\v1\PostsIndexController::class);
Route::middleware('auth:api')->get('/v1/getCategories', App\Http\Controllers\Api\v1\CategoriesIndexController::class);
Route::middleware('auth:api')->post('/v1/getPostsByCategory', App\Http\Controllers\Api\v1\PostsByCategoryController::class);
Route::middleware('auth:api')->post('/v1/getPostsBySlug', App\Http\Controllers\Api\v1\PostsBySlugController::class);
