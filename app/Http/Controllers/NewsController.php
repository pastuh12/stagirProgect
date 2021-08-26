<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function getPage(Request $request):view
    {
        $rubrics = array();
        return view('page.news', ['rubrics' => $rubrics]);
    }
}
