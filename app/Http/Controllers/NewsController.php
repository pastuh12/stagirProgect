<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNews(int $id)
    {
        $currentNews = News::whereId($id)->get();
        $currentNews = $currentNews[0];
//        dump(['title' => $currentNews->title, 'author' => $currentNews->id, 'text'
//        => $currentNews->text]);
        return view('layouts.current-news',['title' => $currentNews->title, 'author' => $currentNews->id, 'text'
        => $currentNews->text]);
    }
}
