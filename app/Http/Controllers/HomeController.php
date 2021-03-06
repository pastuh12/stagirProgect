<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Service\HomeService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function showHomePage()
    {
        $latestNews = HomeService::getLatestNews();
        $bestGallery = HomeService::getBestGallery();
        $rubrics = Category::where('is_published', true);
        return view('page.home', ['news' => $latestNews, 'galleries' => $bestGallery,
            'rubrics' => $rubrics]);
    }
}
