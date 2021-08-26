<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public $timestamps = false;

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'categories_news' ,
            'category_id', 'news_id');
    }

    public function gallery(): BelongsToMany
    {
        return $this->belongsToMany(Gallery::class, 'categories_galleries' ,
            'category_id', 'gallery_id')
            ->where('is_published', 1)->orderByDesc('created_at');
    }

    public static function getGalleries(): array
    {
        $category = array();
        $categories = self::where('is_published', 1)->limit(3)->with('gallery')->get();
        foreach($categories as $value){
            $category[$value->title] = $value->gallery;
        }
        return $category;
    }
}
