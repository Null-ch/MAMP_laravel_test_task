<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/home', App\Http\Controllers\Post\IndexController::class)->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes(['verify' => true]);

Route::group(['App\Http\Controllers\Main', 'middleware' => ['auth']], function () {
    Route::get('/', App\Http\Controllers\Post\IndexController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', App\Http\Controllers\Post\IndexController::class)->name('post.index');
    Route::get('/{post}', App\Http\Controllers\Post\ShowController::class)->name('post.show');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/main', App\Http\Controllers\Admin\Main\IndexController::class)->name('admin.index');
    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::group(['prefix' => 'admin/categories'], function () {
        Route::get('/', App\Http\Controllers\Admin\Category\IndexController::class)->name('admin.category.index');
        Route::get('/create', App\Http\Controllers\Admin\Category\CreateController::class)->name('admin.category.create');
        Route::post('/', App\Http\Controllers\Admin\Category\StoreController::class)->name('admin.category.store');
        Route::get('/{category}', App\Http\Controllers\Admin\Category\ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', App\Http\Controllers\Admin\Category\EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', App\Http\Controllers\Admin\Category\UpdateController::class)->name('admin.category.update');
        Route::post('/activity', App\Http\Controllers\Admin\Category\CategoryActivityStatusController::class);
    });

    Route::group(['prefix' => 'admin/posts'], function () {
        Route::get('/', App\Http\Controllers\Admin\Post\IndexController::class)->name('admin.posts.index');
        Route::get('/create', App\Http\Controllers\Admin\Post\CreateController::class)->name('admin.post.create');
        Route::post('/', App\Http\Controllers\Admin\Post\StoreController::class)->name('admin.post.store');
        Route::get('/{post}', App\Http\Controllers\Admin\Post\ShowController::class)->name('admin.post.show');
        Route::get('/{post}/edit', App\Http\Controllers\Admin\Post\EditController::class)->name('admin.post.edit');
        Route::patch('/{post}', App\Http\Controllers\Admin\Post\UpdateController::class)->name('admin.post.update');
        Route::post('/activity', App\Http\Controllers\Admin\Post\PostActivityStatusController::class);
    });

    Route::group(['prefix' => 'admin/users'], function () {
        Route::get('/', App\Http\Controllers\Admin\User\IndexController::class)->name('admin.users.index');
        Route::get('/create', App\Http\Controllers\Admin\User\CreateController::class)->name('admin.user.create');
        Route::post('/', App\Http\Controllers\Admin\User\StoreController::class)->name('admin.user.store');
        Route::get('/{user}', App\Http\Controllers\Admin\User\ShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', App\Http\Controllers\Admin\User\EditController::class)->name('admin.user.edit');
        Route::patch('/{user}', App\Http\Controllers\Admin\User\UpdateController::class)->name('admin.user.update');
        Route::post('/activity', App\Http\Controllers\Admin\User\UserActivityStatusController::class);
    });
});