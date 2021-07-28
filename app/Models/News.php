<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
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

}
