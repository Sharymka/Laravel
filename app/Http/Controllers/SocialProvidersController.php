<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialProvidersController extends Controller
{
    public function redirect($provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider, UserRepository $userRepository): RedirectResponse
    {
//        error_log($provider);
//        try {
        $socialUser = Socialite::driver($provider)->user();
//        } catch (\Exception $e) {
//            Log::error('Произошла ошибка: ' . $e->getMessage());
//
//            return redirect('/login');
//        }

        $user = $userRepository->getUserBySocId($socialUser, $provider);
//        $user = User::where('email', '=', $socUser->getEmail())->first();
//        error_log($user->avatar);
//
        Auth::login($user);

        return redirect()->route('home');
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
