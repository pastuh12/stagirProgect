<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Service\CommentsService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function ajaxAddComment(Request $request):void
    {
        $user = Comment::create(['name' => $request->name, 'email' => $request->email]);

    }

    public function addComment(Request $request){
        echo "добавлен комментарий";

    }

}
