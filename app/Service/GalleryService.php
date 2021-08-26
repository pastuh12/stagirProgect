<?php

namespace App\Service;

use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;

class GalleryService
{
    public static function addPhoto($values):void
    {
        Gallery::create(['title' => $values->title, 'author_id' => Auth::user()->id,
            'image' => $values->image, 'is_published' => 0]);
    }
}
