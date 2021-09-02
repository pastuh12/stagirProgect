<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function getPage(Request $request):view
    {
        return view('page.news', ['rubrics' => Category::getNews(), 'allNews' => News::getAllNews()]);
    }

    public function getRubric(Request $request, int $rubric)
    {
        return view('page.category', [
            'title' => Category::whereId($rubric)->first()->title,
            'allNews' => News::getRubricNews($rubric),
            'family' => Category::getFamily($rubric)
        ]);
    }
}
