<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Models\Gallery;
use App\Models\News;
use App\Providers\App\Events\NewsHasViewed;
use App\Service\CommentsService;
use App\Service\UserService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EntityController extends Controller
{

    /**
     * @param Request $request
     * @param string $entity
     * @param int $id
     * @return View
     */
    public function getEntity(Request $request, string $entity,int $id):view
    {
        $flag = false;
        if( $entity === 'news'){
            $entityClass = new News();
            $flag = true;
        } else {
            $entityClass = new Gallery();
        }
        $currentEntity = $entityClass::whereId($id)->with(['category', 'user'])->first();
        $commentsService = new CommentsService(get_class($entityClass));
        $comments =  $commentsService->entityComments($id);
        if($flag === true){
            event(new NewsHasViewed($currentEntity));
        }
        return view('page.entity-detail', ['title' => $currentEntity->title ,
            'entity'=>$currentEntity, 'comments' =>$comments]);

    }

    /**
     * @param Request $request
     * @param string $entity
     * @param int $id
     * @param int $count
     * @return View
     */
    public function getCountComments(Request $request,string $entity, int $id, int $count):view
    {
        if( $entity === 'news'){
            $entityClass = new News();
        } else {
            $entityClass = new Gallery();
        }
        $commentsService = new CommentsService(get_class($entityClass));
        $comments =  $commentsService->entityComments($id, $count);
        return view('components.newsSite.commentsList', ['comments' =>$comments]);
    }

    /**
     * @param AddCommentRequest $request
     * @param string $entity
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Redirector
     */
    public function addComment(AddCommentRequest $request, string $entity, int $id)
    {
        if( $entity === 'news'){
            $entityClass = new News();
        } else {
            $entityClass = new Gallery();
        }
        if (Auth::check()) {
            $commentService = new CommentsService(get_class($entityClass));
            $commentService->addComment($request->validated(), $entity, $id);
            UserService::increaseCountComments();
            return redirect("/detail/$entity/$id#message")
                ->with('message', 'Комментарий отправлен');
        }

        return redirect("/detail/$entity/$id#errors")
            ->withErrors('Для этого действия нужно авторизироваться')
            ->withInput();
    }
}
