<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialProvidersController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback(): RedirectResponse
    {
        $socUser = Socialite::driver('vkontakte')->user();
        $user = User::where('email', '=', $socUser->getEmail())->first();

        if ($socUser->getAvatar()) {
            $user->avatar = $socUser->getAvatar();
            $user->save();
        }

        Auth::login($user);

        return redirect()->route('home');
//        return redirect()->route('test', ['socUser' => $user->email]);
    }

//    public function callback(Social $social)
//    {
//        try {
//            $socialUser = Socialite::driver('vkontakte')->user();
//        } catch (\Exception $e) {
//            return redirect('/login');
//        }
//
//        $user = $social->findOrCreateUser($socialUser);
//
//        Auth::login($user, true);
//        event(new DefineLoginEvent($user));
//
//        return redirect(route('home'));
//    }
}
