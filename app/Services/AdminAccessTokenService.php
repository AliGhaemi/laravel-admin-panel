<?php

namespace App\Services;

use App\Models\AdminAccessToken;
use Illuminate\Support\Facades\Auth;

class AdminAccessTokenService
{
    public function createAdminAccessToken(): AdminAccessToken
    {
        $attributes = [
            'user_id' => Auth::id(),
            'access_token' => bin2hex(random_bytes(20)),
        ];

        return AdminAccessToken::create($attributes);
    }
}
