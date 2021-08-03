<?php


namespace App\Service;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;


class Comments
{
    /**
     * @param int $id
     * @param Model $entity
     * @param string $count
     * @param int $pagination
     * @return mixed
     */
    public static function EntityComments(int $id, string $entity, string $count = '20', int $pagination = 10)
    {
        $comments = Comment::where('entity_class', $entity)->where('entity_id', $id)->with('user')
            ->orderByDesc('updated_at');
        if($count !== 'all') {
            return $comments->limit((int)$count)->paginate($pagination);
        }

        return $comments->paginate($pagination);
    }
}
