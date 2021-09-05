<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddGalleryRequest;
use App\Models\Category;
use App\Models\Gallery;
use App\Service\GalleryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function getPage(Request $request):view
    {
        return view('page.gallery', ['category' => Category::getGalleries(), 'allPhoto' => Gallery::getAllPhoto()]);
    }

    public function addPhoto(AddGalleryRequest $request )
    {
        if (Auth::check()) {
            GalleryService::addPhoto($request->validated());

            return redirect(route('get.all.gallery') . '#message')
                ->with('galleryMessage', 'Фото отправлено');
        }

        return redirect(route('get.all.gallery') . '#errors')
            ->withErrors('Для этого действия нужно авторизироваться')
            ->withInput();

    }

    public function getCategory(Request $request, int $category): view
    {
        $title = Category::whereId($category)->get()[0]->title;
        return view('page.category', ['title' => $title,
            'allPhoto' => Gallery::getCategoryPhoto($category)]);
    }
}
