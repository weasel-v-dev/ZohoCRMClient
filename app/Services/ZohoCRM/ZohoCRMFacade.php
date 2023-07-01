<?php

namespace App\Services\ZohoCRM;

class ZohoCRMFacade
{
    public function init($data = []) {
        $account = new AccountAPI();
        $deal = new DealAPI();

        $accountCreatedData = $account->create([
            "Account_Name" => $data['accountName'],
            "Account_Owner" => $data['accountOwner'],
            "Account_Type" => $data['accountType'],
            "Billing_City" => $data['billingStreet'],
            "Shipping_Street" => $data['shippingStreet'],
            "Phone" => $data['phone'],
            "Email" => $data['email'],
            "Website" => $data['website'],
            "Industry" => $data['industry']
        ]);


        $dealCreatedData = $deal->create([
            "Deal_Name" => $data['dealName'],
            "Account_Name" => $data['accountName'],
            "Account_ID" => $accountCreatedData['data']['0']['details']['id'],
            "Deal_Owner" => $data['dealOwner'],
            "Amount" => $data['amount'],
            "Stage" => $data['stage'],
            "Closing_Date" => $data['closingDate'],
            "Probability" => $data['probability'],
            "Description" => $data['dealDescription']
        ]);

        return [
            "account" => $dealCreatedData,
            "deal" => $dealCreatedData
        ];
    }
}
