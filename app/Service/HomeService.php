<?php


namespace App\Service;


use App\Models\Gallery;
use App\Models\News;
use Carbon\Carbon;

class HomeService
{
    /**
     * @param int $pagination
     * @return mixed
     */
    public static function getLatestNews()
    {
        return News::where('created_at', '>', Carbon::now()->locale('ru')->subWeek()->format('Y-m-d'))
            ->where('is_published', 1)
            ->orderByDesc('created_at')->limit(20)->get();
    }

    public static function getBestGallery()
    {
        return Gallery::where('is_published', 1)->orderByDesc('rating')->limit(5)->get();
    }
}
