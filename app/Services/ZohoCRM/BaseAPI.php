<?php

namespace App\Services\ZohoCRM;

use App\Components\HttpAPI;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

abstract class BaseAPI
{

    protected function refresh()
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

    protected function sendRequest($url, $data) {
        $access_token = Auth::user()->access_token;

        dump('AccountService::sendRequest', $access_token);

        dump($data);

        return Http::withHeaders([
            "Authorization" => "Bearer $access_token",
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post($url, ["data" => [
            $data
        ]])->json();
    }
}
