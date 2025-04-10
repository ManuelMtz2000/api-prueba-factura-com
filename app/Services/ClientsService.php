<?php

namespace App\Services;

use GuzzleHttp\Client;

class ClientsService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.factura.url'),
            'headers' => [
                'Content-Type' => 'application/json',
                'F-Plugin' => '9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
                'F-Api-Key' => config('services.factura.keys.api'),
                'F-Secret-Key' => config('services.factura.keys.secret')
            ]
        ]);
    }

    public function index( array $params )
    {
        try {
            
        } catch ( \Exception $e ) {
            throw new \Exception( $e->getMessage() );
        }
    }
}