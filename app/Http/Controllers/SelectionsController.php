<?php


namespace App\Http\Controllers;


use App\Models\Gallery;
use App\Service\RubricService;

class SelectionsController extends Controller
{
    public function getRubric(int $rubric)
    {
        $news = RubricService::getNews($rubric);
        $gallery = Gallery::where('category_id', $rubric)
            ->where('is_published', 1)
            ->orderByDesc('rating')
            ->limit(5)
            ->get();
        return view('page.home', ['news' => $news, 'galleries' => $gallery]);
    }
}
