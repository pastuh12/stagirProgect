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
        return view('page.news', ['rubrics' => Category::getNews(), 'latestNews' => News::getAllPhoto()]);
    }

    public function getRubric(Request $request, string $rubric)
    {
        return view('rubrics', ['rubricNews' => News::getRubricNews($rubric)]);
    }
}
