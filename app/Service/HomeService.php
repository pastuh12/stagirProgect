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
    public static function getLatestNews(int $pagination = 2)
    {
        $news = News::where('updated_at', '>', Carbon::now()->locale('ru')->subWeek()->format('Y-m-d'))
            ->where('is_published', 1)
            ->orderByDesc('updated_at');
        if($pagination !== 0) {
            return $news->simplePaginate($pagination);
        }

        return $news->simplePaginate($pagination);
    }

    public static function getBestGallery()
    {
        return Gallery::where('is_published', 1)->orderByDesc('rating')->limit(5)->get();
    }
}
