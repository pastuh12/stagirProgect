<?php


namespace App\Service;

use App\Models\News;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


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
            return $comments->take($limit)->paginate($pagination);
        }

        return $comments->paginate($pagination);
    }

    /**
     * @param array $request
     * @param int $id
     * @return bool
     */
    public static function addComment(array $request, int $id): void
    {
//        dd(__METHOD__ ,$request);

        if (Auth::user()->countComments >= 5) {
            Comment::create(['entity_id' => $id, 'entity_class' => News::class,
                'author_id' => Auth::user()->id, 'text' => $request['comment'], 'is_published' => 1]);
        } else {
            Comment::create(['entity_id' => $id, 'entity_class' => News::class,
                'author_id' => Auth::user()->id, 'text' => $request['comment']]);
        }
    }
}
