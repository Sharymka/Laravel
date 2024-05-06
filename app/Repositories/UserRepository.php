<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    public function getUserBySocId(\Laravel\Socialite\Contracts\User $user, string $socName)
    {
        $userFromDb = User::query()
                          ->where('id_in_soc', '=', $user->getId())
                          ->where('type_auth', '=', $socName)
                          ->first();

        if (!empty($userFromDb)) {
            return $userFromDb;
        }

        $newUser = new User([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'avatar' => $user->getAvatar() ?? '',
            'password' => '',
            'created_at' => now()->format('y-m-d'),
            'id_in_soc' => $user->getId() ?? '',
            'type_auth' => $socName
        ]);

        $newUser->save();

        return $newUser;
    }

}
