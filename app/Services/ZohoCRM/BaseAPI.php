<?php

namespace App\Services\ZohoCRM;

use App\Components\HttpAPI;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

abstract class BaseAPI
{

    protected function refresh()
    {
        //Automatic token refresh mechanism for uninterrupted creation of records

        $httpAPI = new HttpAPI();
        $user = Auth::user();

        $response = $httpAPI->client->request('POST', 'https://accounts.zoho.eu/oauth/v2/token', [
            "form_params" => [
                "refresh_token" => $user->refresh_token,
                "client_id" => $user->client_id,
                "client_secret" => $user->client_secret,
                'grant_type' => 'refresh_token'
            ]
        ]);

        $access_token = json_decode($response->getBody()->getContents(), true)['access_token'];

        $user->update(['access_token' => $access_token]);
    }

    protected function sendRequest($url, $data) {
        $access_token = Auth::user()->access_token;

        return Http::withHeaders([
            "Authorization" => "Bearer $access_token",
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post($url, ["data" => [
            $data
        ]])->json();
    }

    public function create($data = []) {}
}
