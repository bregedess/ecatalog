<?php


namespace App\Layers;


use GuzzleHttp\Client;

class Sistersel
{
    protected $config;
    protected $client;
    protected $headers;

    public function __construct()
    {
        $this->config = config('services.sistersel');
        $this->client = new Client($this->config);
        $this->headers = [
            'authorization' => 'Bearer '. $this->config['api_key']
        ];
    }

}
