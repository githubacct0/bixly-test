<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseService\BaseService;

class AuthService extends BaseService
{
    private $user;

    /**
     * @param User $user
     *
     *  Method to get login payload
     * @return array
     */
    public function getLoginPayload(User $user): array
    {
        $this->loadUserRelationsForPayload($user);
        return [
            'token' => $this->authUserToken($this->user),
            'user' => $this->user,
            'expires_in' => null
        ];
    }

    /**
     * @param User $user
     *
     *  Method to load User relations for login payload
     */
    public function loadUserRelationsForPayload(User $user)
    {
        $this->user = $user;
    }
}
