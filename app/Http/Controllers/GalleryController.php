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
//        dd($gallery);
        return view('page.gallery-detail', ['title' => $gallery->title ,
            'gallery'=>$gallery, 'comments' =>$comments]);

    }
}
