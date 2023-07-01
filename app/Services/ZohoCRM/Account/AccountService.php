<?php

namespace App\Services\ZohoCRM\Account;

use App\Components\HttpAPI;
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

//        $httpAPI = new HttpAPI();

//        $response = $httpAPI->client->post('https://www.zohoapis.eu/crm/v2/Accounts', [
//            "headers" => [
//                "Authorization" => "Bearer $access_token",
//                "Content-Type" => "application/x-www-form-urlencoded",
//            ],
//            "form_params" => [$data]
//        ]);
//
//        $responseBody = $response->getBody()->getContents();
//        $responseData = json_decode($responseBody, true);
//        var_dump($responseData);
//        die;

//        ["data" => [
//            [
//                "Account_Name" => "John Doe",
//                "Account_Owner" => "John Doe",
//                "Account_Type" => "Customer",
//                "Billing_Address" => "123 Main Street",
//                "Shipping_Address" => "456 Market Street",
//                "Phone" => "123-456-7890",
//                "Email" => "info@example.com",
//                "Website" => "https://www.example.com",
//                "Industry" => "Technology",
//                "Description" => "This is a sample account"
//            ]
//        ]]
        dump($data);
        return Http::withHeaders([
            "Authorization" => "Bearer $access_token",
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post('https://www.zohoapis.eu/crm/v2/Accounts', ["data" => [
            $data
        ]])->body();
    }
}
