<?php

namespace App\Models;

use App\Traits\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Gallery extends Model
{
    public const ENTITY_NAME = 'Фото для галереи';

    use HasFactory;
    use Commentable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id',
        'title',
        'image',
    ];

    protected $attributes = [
        'rating' => 0,
    ];

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_galleries' ,
            'gallery_id', 'category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {

    }

}
