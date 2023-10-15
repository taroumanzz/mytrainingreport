<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContentController;

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

Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');

Route::post('/posts/store', [PostController::class, 'store'])
    ->name('posts.store');

Route::get('/posts/{post}/editPost', [PostController::class, 'editPost'])
    ->name('posts.editPost')
    ->where('posts', '[0-9]+');

Route::patch('/posts/{post}/update', [PostController::class, 'update'])
    ->name('posts.update')
    ->where('posts', '[0-9]+');

Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy'])
    ->name('posts.destroy')
    ->where('posts', '[0-9]+');

Route::post('/posts/{post}/contents', [ContentController::class, 'store'])
    ->name('contents.store');

Route::get('/contents/{content}/editContent', [ContentController::class, 'editContent'])
        ->name('contents.editContent')
        ->where('contents', '[0-9]+');

Route::patch('/contents/{content}/update', [ContentController::class, 'update'])
    ->name('contents.update')
    ->where('contents', '[0-9]+');

Route::delete('/contents/{content}/destroy', [ContentController::class, 'destroy'])
    ->name('contents.destroy')
    ->where('content', '[0-9]+');
