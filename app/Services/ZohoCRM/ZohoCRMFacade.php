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
            "Billing_Address" => $data['billingAddress'],
            "Shipping_Address" => $data['shippingAddress'],
            "Phone" => $data['phone'],
            "Email" => $data['email'],
            "Website" => $data['website'],
            "Industry" => $data['industry']
        ]);

        $dealCreatedData = [];
        foreach ($accountCreatedData['data'] as $el) {
            $dealCreatedData[] = $deal->create([
                "Deal_Name" => $data['dealName'],
                "Account_ID" => $el['details']['id'],
                "Deal_Owner" => $data['dealOwner'],
                "Amount" => $data['amount'],
                "Stage" => $data['stage'],
                "Closing_Date" => $data['closingDate'],
                "Probability" => $data['probability'],
                "Description" => $data['dealDescription']
            ]);
        }

        return [
            "account" => $accountCreatedData,
            "deal" => $dealCreatedData
        ];
    }
}