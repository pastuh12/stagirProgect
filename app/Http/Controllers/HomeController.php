<?php


namespace App\Http\Controllers;


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
        return view('page.home', ['latestNews' => $latestNews ]);
    }

//    public function getLatestNews()
//    {
//         return view('components.newsSite.home.getlatestNews', ['latestNews' => $this->getLatestNews()]);
//    }
}
