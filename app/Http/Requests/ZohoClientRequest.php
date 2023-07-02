<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZohoClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dealName' => 'required|max:50',
            'dealOwner' => 'required|max:50',
            'amount' => 'required|max:16',
            'stage' => 'required|max:100',
            'annualRevenue' => 'required|max:16',
            'closingDate' => 'required|date',
            'probability' => 'required|max:100',
            'description'  => 'required|max:500',
            'dealDescription'  => 'required|max:500',
            'accountNumber'  => 'required|max:18',
            'accountSite'  => 'required|max:50',
            'fax'  => 'required|max:16',
            'leadSource'  => 'required|max:50',
            'accountName' => 'required|max:50',
            'accountOwner' => 'required|max:50',
            'accountType' => 'required|max:25',
            'shippingStreet' => 'required|max:50',
            'shippingCity' => 'required|max:50',
            'shippingState' => 'required|max:50',
            'shippingCode' => 'required|max:30',
            'shippingCountry' => 'required|max:50',
            'billingStreet' => 'required|max:50',
            'billingCity' => 'required|max:50',
            'billingState' => 'required|max:50',
            'billingCode' => 'required|max:30',
            'billingCountry' => 'required|max:50',
            'phone' => 'required|max:30',
            'email' => 'required|email',
            'website' => 'required|url',
            'industry'  => 'required|max:50',
            'rating'  => 'required|max:50',
            'ticketSymbol'  => 'required|max:100',
            'ownership'  => 'required|max:50',
            'employees'  => 'required|max:9',
            'SICCode'  => 'required|max:9',
            'Next_Step'  => 'required|max:500',
            'Expected_Revenue'  => 'required|max:9',
        ];
    }
}
