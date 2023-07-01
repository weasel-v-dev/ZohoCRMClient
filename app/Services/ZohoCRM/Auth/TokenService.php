<?php

namespace App\Services\ZohoCRM\Auth;

use App\Components\HttpAPI;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TokenService
{
    const AUTHENTICATION_FAILURE = 'AUTHENTICATION_FAILURE';
    public static function refresh()
    {
        $refresh_token = Auth::user()->refresh_token;

        $httpAPI = new HttpAPI();

        $response = $httpAPI->client->request('POST', 'https://accounts.zoho.eu/oauth/v2/token', [
            "form_params" => [
                "refresh_token" => $refresh_token,
                "client_id" => config('auth.client_id'),
                "client_secret" => config('auth.client_secret'),
                'grant_type' => 'refresh_token'
            ]
        ]);

        $access_token = json_decode($response->getBody()->getContents(), true)['access_token'];

        Auth::user()->update(['access_token' => $access_token]);
    }
}
