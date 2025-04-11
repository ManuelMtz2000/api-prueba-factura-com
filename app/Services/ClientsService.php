<?php

namespace App\Services;

use App\DTO\CreateClientDto;
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

    public function index()
    {
        try {
            $response = $this->client->request( 'GET', '/api/v1/clients' );

            $responseBody = json_decode( $response->getBody()->getContents(), true );
            return $responseBody['data'];
        } catch ( \Exception $e ) {
            throw new \Exception( $e->getMessage() );
        }
    }

    public function add( CreateClientDto $params )
    {
        try {
            $response = $this->client->request( 'POST', '/api/v1/clients', [
                'json' => $params
            ]);

            $responseBody = json_decode( $response->getBody()->getContents(), true );
            return $responseBody['Data'];
        } catch ( \Exception $e ) {
            throw new \Exception( $e->getMessage() );
        }
    }

    public function search( string $param )
    {
        try {
            $response = $this->client->request( 'GET', '/api/v1/clients/' . $param );
            $responseBody = json_decode( $response->getBody()->getContents(), true );

            if ( $responseBody['status'] == 'error' ) {
                throw new \Exception( $responseBody['message'] );
            }

            return $responseBody['Data'];
        } catch ( \Exception $e ) {
            throw new \Exception( $e->getMessage() );
        }
    }
}