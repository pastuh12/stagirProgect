<?php

use App\Http\Controllers\GalleryController;
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

Route::get('/news/{id}', [NewsController::class, 'getNews']);

Route::get('/gallery/{id}', [GalleryController::class, 'getGallery']);

Route::get('/', function () {
    return view('page.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

