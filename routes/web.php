<?php

use App\Http\Controllers\CommentsController;
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
        ->name('getCountComments');

    Route::post('/detail/{entity}/{id}/add-comment', [EntityController::class, 'addComment'])
        ->name('add.comment');
});


//Route::name('gallery.detail.')->group(function () {
//
//    Route::get('/gallery/{id}', [GalleryController::class, 'getGallery']);
//
//    Route::get('/gallery/{id}/{count}', [GalleryController::class, 'getCountComments'])
//        ->name('getCountComments');
//
//    Route::post('/gallery/{id}/add-comment', [CommentsController::class, 'addComment'])->name('add.comment');
//});





Route::get('/', [HomeController::class, 'showHomePage'])->name('home');

Route::get('/rubrics/{rubric}', [RubricsController::class, 'getRubric'])->name('rubric');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

