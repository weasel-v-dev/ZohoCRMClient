<?php

namespace App\Services\ZohoCRM;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AccountAPI extends BaseAPI
{
    public function create($data = [])
    {
        //Create an account in Zoho CRM
        $result = $this->sendRequest('https://www.zohoapis.eu/crm/v2/Accounts', $data);

        if(!empty($result['status']) && $result['status'] === 'error') {
            $this->refresh();
            $result = $this->sendRequest('https://www.zohoapis.eu/crm/v2/Accounts', $data);
            if(!empty($result['status']) && $result['status'] === 'error') {
                return $result;
            }
        }

        return $result;
    }
}
