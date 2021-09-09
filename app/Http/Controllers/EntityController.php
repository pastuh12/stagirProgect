<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Service\EntityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EntityController extends Controller
{
    public function getEntity(Request $request, string $entity,int $id):view
    {
        $EntityService = new EntityService($entity, $id);
        return view('page.entity-detail', ['entity'=>$EntityService->getEntity(),
            'comments' =>$EntityService->getComments()]);

    }

    public function getCountComments(Request $request,string $entity, int $id, int $count):view
    {
        $EntityService = new EntityService($entity, $id);

        return view('components.newsSite.comments-foreach',
            ['comments' =>$EntityService->getComments($count)]);
    }

    public function addComment(AddCommentRequest $request, string $entity, int $id)
    {
        $EntityService = new EntityService($entity, $id);
        if (Auth::check()) {
            $EntityService->addComment($request->validated());

            return redirect(route('getEntity', ['entity' => $entity, 'id' => $id]) . '#messanges')
                ->with('message', 'Комментарий отправлен');
        }

        return redirect(route('getEntity', ['entity' => $entity, 'id' => $id]) . '#errors')
            ->withErrors('Для этого действия нужно авторизироваться')
            ->withInput();
    }
}
