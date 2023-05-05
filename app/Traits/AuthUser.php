<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait AuthUser
{
    protected $authUserData = null;

    public function authTokenKey()
    {
        return config('constants.app_login_token');
    }

    public function authUserToken($user = null)
    {
        $user = $user ?? $this->getAuthUser();
        return intval($user->id) > 0 ? $user->createToken($this->authTokenKey())->plainTextToken : null;
    }

    public function getAuthUser()
    {
        return $this->authUserData['auth_user'] = (isset($this->authUserData['auth_user']) && $this->authUserData['auth_user'] != null) ? $this->authUserData['auth_user'] : (Auth::check() ? Auth::user() : null);
    }

    public function getAuthUserId()
    {
        $user = $this->getAuthUser();
        return $user->id ?? 0;
    }
}
