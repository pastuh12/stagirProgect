<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Service\CommentsService;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function getGallery(Request $request,int $id)
    {
        $gallery = Gallery::whereId($id)->with(['category', 'user'])->first();
        $commentsService = new CommentsService(Gallery::class);
        $comments =  $commentsService->entityComments($id);
        return view('page.news-detail', ['title' => $gallery->title ,
            'news'=>$gallery, 'comments' =>$comments]);

    }
}
