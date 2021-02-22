<?php

use App\Http\Controllers\ArticleController;
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

Route::middleware('auth')->prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/show/{id}', [ArticleController::class, 'show'])->name('article.show');
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::get('/update/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/delete/{id}', [ArticleController::class, 'delete'])->name('article.delete');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
