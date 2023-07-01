<?php

namespace App\Services\ZohoCRM\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TokenService
{
    public function refresh()
    {
        Http::post('https://accounts.zoho.eu/oauth/v2/token', [
            'refresh_token' => Auth::user()->refresh_token,
            "client_id" => config('auth.client_id'),
            "client_secret" => config('auth.client_secret'),
            'grant_type' => 'refresh_token'
        ]);
    }
}
