<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Mail\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function send(FeedbackRequest $request)
    {
        if (Auth::check()) {
            $user = auth()->user();
            Mail::to('ilyatarasov75@gmail.com')
                ->send(new Feedback($user->name, $user->email, $request->text));
//            return redirect(route('getEntity', ['entity' => $entity, 'id' => $id]) . '#messanges')
//                ->with('message', 'Комментарий отправлен');
        }
        dd('не авторизован');
//        return redirect(route('getEntity', ['entity' => $entity, 'id' => $id]) . '#errors')
//            ->withErrors('Для этого действия нужно авторизироваться')
//            ->withInput();
    }
}