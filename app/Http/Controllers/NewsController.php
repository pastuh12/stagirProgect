<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use App\Service\Comments;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNews(Request $request,int $id)
    {
        $news = News::whereId($id)->with(['category', 'user'])->first();
        $comments = Comments::EntityComments($id, 'News');
        return view('page.news-detail', ['request' => $request, 'title' => $news->title ,
            'news'=>$news, 'comments' =>$comments]);

    }
}
