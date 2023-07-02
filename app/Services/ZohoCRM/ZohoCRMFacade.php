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

            "Shipping_Street" => $data['shippingStreet'],
            "Shipping_City" => $data['shippingCity'],
            "Shipping_State" => $data['shippingState'],
            "Shipping_Code" => $data['shippingCode'],
            "Shipping_Country" => $data['shippingCountry'],
            "Billing_Street" => $data['billingStreet'],
            "Billing_City" => $data['billingCity'],
            "Billing_State" => $data['billingState'],
            "Billing_Code" => $data['billingCode'],
            "Billing_Country" => $data['billingCountry'],

            "Account_Number" => $data['accountNumber'],
            "Account_Type" => $data['accountType'],
            "Phone" => $data['phone'],
            "Email" => $data['email'],
            "Website" => $data['website'],
            "Account_Site" => $data['accountSite'],
            "Annual_Revenue" => $data['annualRevenue'],
            "Fax" => $data['fax'],
            "Industry" => $data['industry'],
            "Description" => $data['description']
        ]);

        $dealCreatedData = $deal->create([
            "Deal_Name" => $data['dealName'],

            // Linking of the account and deal records in Zoho CRM
            "Account_Name" => $data['accountName'],
            "Account_ID" => $accountCreatedData['data']['0']['details']['id'],
            //

            "Deal_Owner" => $data['dealOwner'],
            "Type" => $data['accountType'],
            "Description" => $data['dealDescription'],
            "Amount" => $data['amount'],
            "Stage" => $data['stage'],
            "Closing_Date" => $data['closingDate'],
            "Probability" => $data['probability'],
            "Lead_Source" => $data['leadSource']
        ]);

        return [
            "account" => $dealCreatedData,
            "deal" => $dealCreatedData
        ];
    }
}
