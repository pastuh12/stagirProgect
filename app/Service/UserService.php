<?php


namespace App\Service;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{

    public static function increaseCountComments(): void
    {
        $user = User::find(Auth::user()->id);
        $user->countComments++;
        $user->save();
    }
}
