<?php


namespace App\Service;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;


class CommentsService
{
    private string $entity;

    public function __construct(string $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @param int $id
     * @param int $limit
     * @param int $pagination
     * @return mixed
     */
    public function entityComments(int $id, int $limit = 20, int $pagination = 10)
    {

        $comments = Comment::where('entity_class', $this->entity)
            ->where('entity_id', $id)
            ->where('is_published', 1)
            ->with('user')
            ->orderByDesc('updated_at');
        if ($limit !== 0) {
            dd( $comments->take(1)->paginate($pagination));
        }

//        return $comments->paginate($pagination);
    }
}
