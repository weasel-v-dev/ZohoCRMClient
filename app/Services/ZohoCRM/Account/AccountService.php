<?php

namespace App\Services\ZohoCRM\Account;

use App\Services\ZohoCRM\Auth\TokenService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AccountService
{
    const ERROR = "error";

    public function create($data = [])
    {
        $result = $this->sendRequest($data);

        if(!empty($result['status']) && $result['status'] === AccountService::ERROR) {
            if($result['code'] === TokenService::AUTHENTICATION_FAILURE) {
                TokenService::refresh();
                $result = $this->sendRequest($data);
            }
            else {
                return $result['message'];
            }
        }

        return $result;
    }
    private function sendRequest($data) {

        $access_token = Auth::user()->access_token;

        dump('AccountService::sendRequest', $access_token);

        return Http::withHeaders([
            'Authorization: Zoho-oauthtoken ' . $access_token
        ])->post('https://www.zohoapis.eu/crm/v2/Accounts', $data)->json();
    }
}
