<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RubricsController;
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

Route::get('/news/{id}/{count}', [NewsController::class, 'getCountComments'])->name('news.detail.getCountComments');

Route::get('/gallery/{id}', [GalleryController::class, 'getGallery'])->name('gallery.detail');

Route::get('/', [HomeController::class, 'showHomePage'])->name('home');

Route::get('/rubrics/{rubric}', [RubricsController::class, 'getRubric'])->name('rubric');

Route::any('/add-comment', [CommentsController::class, 'addComments'])->name('add.comment');



//Route::get('/whatsNew', [HomeController::class, 'showWhatsNew']);

//Route::name('user.')->group(function(){
//   Route::view('/private', 'private')->middleware('auth')->name('private');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

