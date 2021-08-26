<?php

use App\Http\Controllers\EntityController;
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
Route::name('detail.entity.')->group(function () {
    Route::get('/detail/{entity}/{id}', [EntityController::class, 'getEntity']);

    Route::get('/detail/{entity}/{id}/{count}', [EntityController::class, 'getCountComments'])
        ->name('getCountComments')->where(['id' => '[0-9]+', 'count' => '[0-9]+']);

    Route::post('/detail/{entity}/{id}/add-comment', [EntityController::class, 'addComment'])
        ->name('add.comment');
});

Route::get('/all-news', [NewsController::class, 'getPage'])->name('get.all.news');

Route::get('/all-gallery', [GalleryController::class, 'getPage'])->name('get.all.gallery');
Route::post('/all-gallery/add-photo', [GalleryController::class, 'addPhoto'])->name('add.photo');
Route::post('/all-gallery/category', [GalleryController::class, 'getCategory'])->name('category');

Route::get('/', [HomeController::class, 'showHomePage'])->name('home');

Route::get('/rubrics/{rubric}', [RubricsController::class, 'getRubric'])->name('rubric');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

