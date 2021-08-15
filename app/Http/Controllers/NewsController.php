<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use App\Providers\App\Events\NewsHasViewed;
use App\Service\CommentsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @param Request $request
     * @param int $id
     * @return Application|Factory|View
     */
    public function getNews(Request $request,int $id)
    {
        $news = News::whereId($id)->with(['category', 'user'])->first();
        $commentsService = new CommentsService(News::class);
        $comments =  $commentsService->entityComments($id);
        event(new NewsHasViewed($news));
        return view('page.news-detail', ['title' => $news->title ,
            'news'=>$news, 'comments' =>$comments]);

    }

//    public function getCountComments(Request $request, int $id, int $count){
//        $news = News::whereId($id)->first();
//        $commentsService = new CommentsService(News::class);
//        $comments =  $commentsService->entityComments($id);
//        return view('page.news-detail', ['title' => $news->title ,
//            'news'=>$news, 'comments' =>$comments]);
//    }
}
