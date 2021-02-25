<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Blog\CommentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Blog\HomeController as BlogHome;
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

Route::middleware(['auth', 'verified'])->get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes(['verify' => true]);

//Route::resource('articles', ArticleController::class)->middleware('auth');

Route::middleware(['auth', 'verified'])->namespace('Admin')->group(function () {
    Route::prefix('admin/users')->group(function () {
        Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
    });

    Route::prefix('admin/articles')->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('article.index');
        Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
        Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
        Route::get('/show/{id}', [ArticleController::class, 'show'])->name('article.show');
        Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
        Route::put('/update/{id}', [ArticleController::class, 'update'])->name('article.update');
        Route::get('/delete/{id}', [ArticleController::class, 'delete'])->name('article.delete');
        Route::get('/destroy/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
        Route::get('/search/', [ArticleController::class, 'search'])->name('article.search');
    });

    Route::prefix('admin/tags')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('tag.index');
        Route::get('/create', [TagController::class, 'create'])->name('tag.create');
        Route::post('/store', [TagController::class, 'store'])->name('tag.store');
        Route::get('/show/{tag}', [TagController::class, 'show'])->name('tag.show');
        Route::get('/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
        Route::put('/update/{tag}', [TagController::class, 'update'])->name('tag.update');
        Route::get('/delete/{tag}', [TagController::class, 'delete'])->name('tag.delete');
        Route::get('/destroy/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
        Route::get('/search/', [TagController::class, 'search'])->name('tag.search');
    });

    Route::prefix('admin/')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    });
});

Route::namespace('Blog')->group(function () {
    Route::prefix('/')->group(function () {
        Route::get('/', [BlogHome::class, 'index'])->name('home.index');
    });

    Route::prefix('/blogs/comments')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('comment.index');
        Route::get('/create', [CommentController::class, 'create'])->name('comment.create');
        Route::post('/store', [CommentController::class, 'store'])->name('comment.store');
        Route::get('/edit/{comment}', [CommentController::class, 'edit'])->name('comment.edit');
        Route::put('/update/{comment}', [CommentController::class, 'update'])->name('comment.update');
        Route::get('/destroy/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
    });
});
