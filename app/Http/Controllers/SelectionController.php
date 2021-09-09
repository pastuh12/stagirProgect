<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Gallery;
use App\Service\RubricService;

class SelectionController extends Controller
{
    public function getSelection(int $category)
    {
        $news = RubricService::getNews($category);
        $gallery = Gallery::where('category_id', $category)
            ->where('is_published', 1)
            ->orderByDesc('rating')
            ->limit(5)
            ->get();
        return view('page.home', ['title' => Category::whereId($category)->first()->title, 'news' => $news, 'galleries' => $gallery]);
    }
}
