<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id',
        'title',
        'image',
        'category_id',
        'created_at',
        'updated_at',
    ];

    protected $attributes = [
        'rating' => 0,
    ];

    public $timestamps = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'entity_id');
    }

    /**
     * @return float|int
     */
    public  function getRating()
    {
        $comments = $this->comments()
            ->where('rating', '!=', 'NULL')->get();

        $sumRating = 0;

        foreach($comments as $comment){
            $sumRating += $comment->rating;
        }
        if($comments->count() === 0) {
            return 0;
        }
        return  round($sumRating / $comments->count(), 1);
    }

    public static function getAllPhoto()
    {
        return self::where('is_published', 1)->orderByDesc('created_at')->with('user', 'category')->paginate(20);
    }

    public static function getCategoryPhoto(int $category)
    {
        return self::where('is_published', 1)->where('category_id', $category)->orderByDesc('updated_at')
            ->with('user')->paginate(20);
    }
}
