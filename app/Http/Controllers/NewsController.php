<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Service\CommentsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function getNews(int $id)
    {
        $news = News::whereId($id)
            ->with([
                'category',
                'user',
            ])
            ->first();

//        $news->load('comments', function ($relation) {
//            return $relation->where('entity_class', News::class)
//                ->with('user')
//                ->orderByDesc('updated_at');
//        });

        $commentService = new CommentsService(News::class);
        $comments = $commentService->getComments($id);

        return view('page.news-detail', [
            'title' => $news->title ,
            'news' => $news,
            'comments' => $comments,
        ]);
    }
}
