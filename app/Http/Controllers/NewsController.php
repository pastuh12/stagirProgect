<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Models\Comment;
use App\Models\News;
use App\Providers\App\Events\NewsHasViewed;
use App\Service\CommentsService;
use App\Service\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
//    /**
//     * @param Request $request
//     * @param int $id
//     * @return Application|Factory|View
//     */
//    public function getNews(Request $request,int $id)
//    {
//        $news = News::whereId($id)->with(['category', 'user'])->first();
////        dd(get_class($news));
//        $commentsService = new CommentsService(News::class);
//        $comments =  $commentsService->entityComments($id);
//        event(new NewsHasViewed($news));
//        return view('page.news-detail', ['title' => $news->title ,
//            'news'=>$news, 'comments' =>$comments]);
//
//    }
//
//    /**
//     * @param Request $request
//     * @param int $id
//     * @param int $count
//     * @return Application|Factory|View
//     */
//    public function getCountComments(Request $request, int $id, int $count){
//        $commentsService = new CommentsService(News::class);
//        $comments =  $commentsService->entityComments($id, $count);
//        return view('components.newsSite.commentsList', ['comments' =>$comments]);
//    }
//
//    /**
//     * @param AddCommentRequest $request
//     * @param int $id
//     * @return Application|RedirectResponse|Redirector
//     */
//    public function addComment(AddCommentRequest $request, int $id)
//    {
//
//        if (Auth::check()) {
//            $commentService = new CommentsService(News::class);
//            $commentService->addComment($request->validated(), $id);
//            UserService::increaseCountComments();
//            return redirect("/news/$id#message")
//                ->with('message', 'Комментарий отправлен');
//        }
//
//        return redirect("news/$id#errors")
//            ->withErrors('Для этого действия нужно авторизироваться')
//            ->withInput();
//    }
}
