<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
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
//Route::get('/categ/{id}', [App\Http\Controllers\CategoriesNewsController::class, 'manyToMany']);

Route::get('/news/{id}', [NewsController::class, 'getNews'])->name('news.detail');

Route::get('/gallery/{id}', [GalleryController::class, 'getGallery'])->name('gallery.detail');

Route::get('/', [HomeController::class, 'showHomePage']);

Route::any('/add-comment', [CommentsController::class, 'addComments'])->name('add.comment');

//Route::get('/whatsNew', [HomeController::class, 'showWhatsNew']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

