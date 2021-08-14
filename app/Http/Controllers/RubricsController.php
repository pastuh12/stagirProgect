<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\News;
use App\Service\RubricService;
use Illuminate\Database\Eloquent\Model;

class RubricsController extends Controller
{
    public function getRubric(string $rubric)
    {
        $news = RubricService::getNews($rubric);
        $gallery = Category::firstWhere('title', $rubric)->gallery;
        return view('page.home', ['news' => $news, 'galleries' => $gallery]);
    }
}
