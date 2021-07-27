<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public $timestamps = false;

    public function news()
    {
        return $this->belongsToMany(News::class);
    }

}
