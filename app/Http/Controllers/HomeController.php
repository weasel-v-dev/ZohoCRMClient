<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZohoClientRequest;
use App\Services\ZohoCRM\ZohoCRMFacade;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('dashboard');
    }
    public function store(ZohoClientRequest $request) {
        $data = $request->validated();

        $zohoCRM = new ZohoCRMFacade();
        $response = $zohoCRM->init($data);

        return response()->json(['response' => $response]);
    }
}
