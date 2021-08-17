<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Models\Gallery;
use App\Service\CommentsService;
use App\Service\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
//    /**
//     * @param Request $request
//     * @param int $id
//     * @param int $limit
//     * @return Application|Factory|View
//     */
//    public function getGallery(Request $request,int $id, int $limit = 20)
//    {
//        $gallery = Gallery::whereId($id)->with(['category', 'user'])->first();
//        $commentsService = new CommentsService(Gallery::class);
//        $comments =  $commentsService->entityComments($id, $limit);
////        dd($gallery);
//        return view('page.gallery-detail', ['title' => $gallery->title ,
//            'gallery'=>$gallery, 'comments' =>$comments]);
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
//        $commentsService = new CommentsService(Gallery::class);
//        $comments =  $commentsService->entityComments($id, $count);
//        return view('components.newsSite.commentsList', ['comments' =>$comments]);
//    }
//
//    public function addComment(AddCommentRequest $request, int $id)
//    {
//
//        if (Auth::check()) {
//            $commentsService = new CommentsService(Gallery::class);
//            $commentsService::addComment($request->validated(), $id);
//            UserService::increaseCountComments();
//            return redirect("/gallery/$id#message")
//                ->with('message', 'Комментарий отправлен');
//        }
//
//        return redirect("gallery/$id#errors")
//            ->withErrors('Для этого действия нужно авторизироваться')
//            ->withInput();
//    }
}
