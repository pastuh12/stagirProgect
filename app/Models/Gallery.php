<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Gallery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'image',
    ];

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_galleries' ,
            'gallery_id', 'category_id');
    }

}
