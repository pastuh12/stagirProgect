<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class CategoriesNewsController extends Controller
{
    public function manyToMany(): void
    {
        $news = News::where('id', 1);

        foreach ($news->categories as $categories) {
            echo $categories;
        }
    }

}
