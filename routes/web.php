<?php

use App\Http\Controllers\EntityController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SelectionsController;
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
Route::prefix('detail/')->group(function () {
    Route::get('{entity}/{id}', [EntityController::class, 'getEntity'])->name('getEntity');

    Route::get('{entity}/{id}/{count}', [EntityController::class, 'getCountComments'])
        ->name('getCountComments')->where(['id' => '[0-9]+', 'count' => '[0-9]+']);

    Route::post('{entity}/{id}/add-comment', [EntityController::class, 'addComment'])
        ->name('add.comment');
});

Route::prefix('all-news')->group(function () {
    Route::get('', [NewsController::class, 'getPage'])->name('get.all.news');
    Route::get('/{rubric}', [NewsController::class, 'getRubric'])->name('rubric');
});

Route::prefix('all-gallery')->group(function() {
    Route::get('', [GalleryController::class, 'getPage'])->name('get.all.gallery');

    Route::post('/add-photo', [GalleryController::class, 'addPhoto'])->name('add.photo');

    Route::get('/{category}', [GalleryController::class, 'getCategory'])->name('category');
});

Route::get('/', [HomeController::class, 'showHomePage'])->name('home');

Route::get('/selections/{rubric}', [SelectionsController::class, 'getRubric'])->name('selection');

Route::get('/feedback', [FeedbackController::class, 'send'])->name('send.feedback');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

