<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Service\Comments;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function getNews(Request $request,int $id)
    {
        $news = Gallery::whereId($id)->with(['category', 'user'])->first();
        $comments = Comments::EntityComments($id, 'News');
        return view('page.news-detail', ['request' => $request, 'title' => $news->title ,
            'news'=>$news, 'comments' =>$comments]);

    }
}
