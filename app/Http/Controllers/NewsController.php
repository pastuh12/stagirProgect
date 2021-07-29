<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNews(int $id)
    {
        $news = News::whereId($id)->with(['category', 'user'])->first();

        return view('page.news-detail', ['title' => $news->title ,'currentNews'=> $news]);

    }
}
