<?php

namespace App\Service;

use App\Models\Gallery;
use App\Models\News;
use App\Providers\App\Events\NewsHasViewed;
use Illuminate\Database\Eloquent\Model;

class EntityService
{
    protected Model $entityClass;
    protected int $id;

    public function __construct(string $entity, int $id){
        if( $entity === 'news'){
            $this->entityClass = new News();
        } else {
            $this->entityClass = new Gallery();
        }

        $this->id = $id;
    }

    public function getEntity()
    {
        $currentEntity = $this->entityClass::whereId($this->id)->with(['category', 'user'])->first();

        if(get_class($this->entityClass) === News::class){
            event(new NewsHasViewed($currentEntity));
        }

        return $currentEntity;
    }

    public function getComments(int $count = 20){
        $commentsService = new CommentsService(get_class($this->entityClass));

        return $commentsService->entityComments($this->id, $count);
    }

    public function addComment($request): void
    {
        $commentService = new CommentsService(get_class($this->entityClass));
        $commentService->addComment($request,$this->entityClass, $this->id);

        UserService::increaseCountComments();
    }
}