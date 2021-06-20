<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class TwitchOauthController extends Controller
{
    public function authenticate()
    {
        return Socialite::driver('twitch')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('twitch')->user();
        $auth = User::whereEmail($user->email)->first();
        if(!$auth) {
            $auth = new User();
            $auth->name = $user->nickname;
            $auth->email = $user->email;
            $auth->twitch_id = $user->id;
        } else {
            $auth->name = $user->nickname;
        }
        $auth->save();

        \Auth::login($auth);
        return redirect('dashboard');
        }
}
