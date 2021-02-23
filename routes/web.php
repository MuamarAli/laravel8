<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Auth::routes();

//Route::resource('articles', ArticleController::class)->middleware('auth');

Route::middleware('auth')->namespace('Admin')->group(function () {
    Route::prefix('admin/articles')->prefix('admin/articles')->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('article.index');
        Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
        Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
        Route::get('/show/{article}', [ArticleController::class, 'show'])->name('article.show');
        Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
        Route::put('/update/{article}', [ArticleController::class, 'update'])->name('article.update');
        Route::get('/delete/{article}', [ArticleController::class, 'delete'])->name('article.delete');
        Route::get('/destroy/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
    });


    Route::prefix('admin/articles')->prefix('admin/tags')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('tag.index');
        Route::get('/create', [TagController::class, 'create'])->name('tag.create');
        Route::post('/store', [TagController::class, 'store'])->name('tag.store');
        Route::get('/show/{tag}', [TagController::class, 'show'])->name('tag.show');
        Route::get('/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
        Route::put('/update/{tag}', [TagController::class, 'update'])->name('tag.update');
        Route::get('/delete/{tag}', [TagController::class, 'delete'])->name('tag.delete');
        Route::get('/destroy/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
