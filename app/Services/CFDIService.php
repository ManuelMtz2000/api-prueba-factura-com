<?php

namespace App\Services;

use GuzzleHttp\Client;

class CFDIService
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
            $response = $this->client->request( 'GET', '/api/v4/cfdi/list' );
            $responseBody = json_decode( $response->getBody()->getContents(), true );
            dd( $responseBody );
        } catch ( \Exception $e ) {
            throw new \Exception( $e->getMessage() );
        }
    }
}
