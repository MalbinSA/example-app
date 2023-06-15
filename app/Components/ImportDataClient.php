<?php


namespace App\Components;

use GuzzleHttp\Client;

class ImportDataClient
{
    public $client;

    /**
     * ImportDataClient constructor.
     * @param $client
     */
    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used relative requests
            'base_uri' => 'https://jsonplaceholder.typicode.com/',
            //You can set any number of default request options.
            'timeout' => 2.0,
        ]);
    }
}
