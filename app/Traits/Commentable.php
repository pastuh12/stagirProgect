<?php

namespace App\Traits;

trait Commentable
{
    public function getComments()
    {
        return $this->comments()->where('entity_class', static::class)
            ->with('user')
            ->orderByDesc('updated_at');
    }

}
