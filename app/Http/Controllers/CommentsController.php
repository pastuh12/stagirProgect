<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Service\CommentsService;
use App\Service\UserService;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function addComment(AddCommentRequest $request, int $id)
    {

//        dd($request->validated());
        if (Auth::check()) {
            CommentsService::addComment($request->validated(), $id);
            UserService::increaseCountComments();
            return redirect("/news/$id#message")
                ->with('message', 'Комментарий отправлен');
        }

        return redirect("news/$id#errors")
            ->withErrors('Для этого действия нужно авторизироваться')
            ->withInput();
    }

}
