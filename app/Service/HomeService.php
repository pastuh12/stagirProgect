<?php


namespace App\Service;


use App\Models\News;
use Carbon\Carbon;

class HomeService
{
    public static function getLatestNews(int $count = 20, int $pagination = 10)
    {
        $news = News::where('updated_at', '>', Carbon::now()->locale('ru')->subWeek()->format('Y-m-d'))
            ->orderByDesc('updated_at');
        if($count !== 0) {
            return $news->limit($count)->paginate($pagination);
        }

        return $news->paginate($pagination);
    }
}
