<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZohoClientRequest;
use App\Services\ZohoCRM\Account\AccountService;
use App\Services\ZohoCRM\Deal\DealService;

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

        return $this->account->create($data);
    }

}
