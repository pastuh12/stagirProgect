<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'image',
        'describe',
        'text',
    ];

    protected $attributes = [
        'is_published' => false,
        'views' => 0,
    ];

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_news' ,
            'news_id', 'category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public static function getAllNews()
    {
        return self::where('is_published', 1)->orderByDesc('updated_at')->with('user', 'category')->paginate(20);
    }

    public static function getRubricNews(int $rubric)
    {
        return DB::table('news')
            ->join('categories_news', 'news.id', '=', 'categories_news.news_id')
            ->select('news.*', 'categories_news.category_id')
            ->where('category_id', $rubric)
            ->orderByDesc('updated_at')
            ->paginate(20);
    }



}
