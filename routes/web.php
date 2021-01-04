<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoriesController;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
Route::get('blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');


Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('categories', CategoriesController::class);
    Route::resource('tags', TagsController::class);
    Route::resource('posts', PostsController::class);
    Route::get('post/{post}', [PostsController::class, 'show'])->name('viewPost');
    Route::get('trashed-posts', [PostsController::class, 'trashed'])->name('trashed-posts.index');
    Route::put('restore-post/{post}', [PostsController::class, 'restore'])->name('restore-post');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('users/profile', [UsersController::class, 'edit'])->name('users.edit-profile');
    Route::put('users/profile', [UsersController::class, 'update'])->name('users.update-profile');
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::post('users/{user}/make-admin', [UsersController::class, 'makeAdmin'])->name('users.make-admin');
});