<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZohoClientRequest;
use App\Http\Resources\AccountResource;
use App\Services\ZohoCRM\Account\AccountService;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AccountService $account)
    {
        parent::__construct($account);
        $this->middleware('auth');
    }
    public function index()
    {
        return view('dashboard');
    }
    public function store(ZohoClientRequest $request) {
        $data = $request->validated();


        return $this->account->create([
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
    }
}
