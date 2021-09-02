<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'parent',
    ];

    public $timestamps = false;

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'categories_news',
            'category_id', 'news_id');
    }

    public function limitNews(): BelongsToMany
    {
        return $this->news();
    }

    public static function getNews(): array
    {
        $category = array();
        $categories = self::where('is_published', 1)->with('limitNews')->get();
        foreach ($categories as $value) {
            $category[] = $value;
        }
        return $category;
    }


    public static function getFamily($rubric_id)
    {
        $rubric = self::whereId($rubric_id)->where('is_published', 1)->get();

        return $rubric[0]->parent ?
            $rubric :
            self::where('parent', $rubric_id)->where('is_published', 1)->get();
    }


    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class, 'category_id',
            'id')
            ->where('is_published', 1)->orderByDesc('created_at');
    }

    public function limitGallery(): HasMany
    {
        return $this->gallery()->limit(3);
    }

    public static function getGalleries(): array
    {
        $category = array();
        $categories = self::where('is_published', 1)->with('limitGallery')->get();
        foreach($categories as $value){
            $category[] = $value;
        }
        return $category;
    }


}
