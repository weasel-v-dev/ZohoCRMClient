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
            'amount' => 'required|max:50',
            'stage' => 'required|max:25',
            'closingDate' => 'required|date',
            'probability' => 'required|max:3',
            'dealDescription'  => 'required|max:500',
            'accountName' => 'required|max:50',
            'accountOwner' => 'required|max:50',
            'accountType' => 'required|max:25',
            'billingAddress' => 'required|max:50',
            'shippingAddress' => 'required|max:50',
            'phone' => 'required|max:30',
            'email' => 'required|email',
            'website' => 'required|url',
            'industry'  => 'required|max:50'
        ];
    }
}
