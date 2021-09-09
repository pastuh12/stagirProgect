<?php


namespace App\Service;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentsService
{
    private string $entity;

    public function __construct(string $entity)
    {
        $this->entity = $entity;
    }

    public function entityComments(int $id, int $count = 20)
    {
        $comments = Comment::where('entity_class', $this->entity)
            ->where('entity_id', $id)
            ->where('is_published', 1)
            ->with('user')
            ->orderByDesc('updated_at');

        if ($count === 0) {
            return $comments->skip(20)->take(30)->get();
        }

        return $comments->take($count)->get();
    }

    public function addComment(array $request, string $entity, int $id): void
    {
        if ($entity === 'gallery') {

            if (Auth::user()->countComments >= 5) {
                Comment::create(['entity_id' => $id, 'entity_class' => $this->entity,
                    'author_id' => Auth::user()->id, 'text' => $request['comment'], 'rating' => (int)$request['rating']
                    , 'is_published' => 1]);
            } else {
                Comment::create(['entity_id' => $id, 'entity_class' => $this->entity,
                    'author_id' => Auth::user()->id, 'text' => $request['comment'], 'rating' => (int)$request['rating']]);
            }
        } else if (Auth::user()->countComments >= 5) {
            Comment::create(['entity_id' => $id, 'entity_class' => $this->entity,
                'author_id' => Auth::user()->id, 'text' => $request['comment'], 'is_published' => 1]);
        } else {
            Comment::create(['entity_id' => $id, 'entity_class' => $this->entity,
                'author_id' => Auth::user()->id, 'text' => $request['comment']]);
        }
    }
}
