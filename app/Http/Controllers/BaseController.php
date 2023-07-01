<?php

namespace App\Http\Controllers;

use App\Services\ZohoCRM\Account\AccountService;

class BaseController extends Controller
{
    /**
     * @var AccountService
     */
    protected $account;

    public function __construct(AccountService $account)
    {
        $this->account = $account;
    }
}
