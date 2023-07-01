<?php


namespace App\Components;


use GuzzleHttp\Client;

class HttpAPI
{
    public $client;

    /**
     * ImportUsersClient constructor.
     * @param $client
     */
    public function __construct()
    {
        $this->client = new Client([
            'timeout'  => 2.0,
            'verify' => true
        ]);
    }
}
