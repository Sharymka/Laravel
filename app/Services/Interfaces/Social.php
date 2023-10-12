<?php

namespace App\Services\Interfaces;

use Laravel\Socialite\Contracts\User as SocialUser;

interface Social
{
    public function findOrCreateUser(SocialUser $socialUser): void;
}
