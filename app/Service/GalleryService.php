<?php

namespace App\Service;

use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GalleryService
{
    public static function addPhoto($values):void
    {
        $path = $values['image']->store('gallery/images');
        Gallery::create(['title' => $values['title'], 'author_id' => Auth::user()->id,
            'image' => 'storage/' . $path,
            'category_id' => $values['category'],
            'created_at' => Carbon::now('Europe/Moscow'),
            'updated_at' => Carbon::now('Europe/Moscow')]);

    }
}
