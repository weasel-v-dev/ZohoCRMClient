<?php

namespace App\Services\ZohoCRM;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DealAPI extends BaseAPI
{
    public function create($data = [])
    {
        //Create a deal in Zoho CRM
        $result = $this->sendRequest('https://www.zohoapis.eu/crm/v2/Deals', $data);

        if(!empty($result['status']) && $result['status'] === 'error') {
            $this->refresh();
            $result = $this->sendRequest('https://www.zohoapis.eu/crm/v2/Deals', $data);
            if(!empty($result['status']) && $result['status'] === 'error') {
                return $result;
            }
        }

        return $result;
    }
}
