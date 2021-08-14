<?php


namespace App\Service;


use App\Models\Category;
use App\Models\News;

class RubricService
{
    public static function getNews(string $rubric){
        $news =Category::firstWhere('title', $rubric)->news;
        $keys= array();
        foreach($news as $value){
            $keys[] = $value->id;
        }
        return News::whereIn('id', $keys)
            ->where('is_published', 1)
            ->orderByDesc('updated_at')->simplePaginate(2);
    }

}
