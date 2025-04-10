<?php

namespace App\Services;

use App\DTO\CFDIDto;
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

    public function index( CFDIDto $params )
    {
        try {
            $response = $this->client->request( 'GET', '/api/v4/cfdi/list', [
                'query' => [
                    'page' => $params->page,
                    'per_page' => $params->per_page,
                    'month' => $params->month,
                    'year' => $params->year,
                    'rfc' => $params->rfc
                ]
            ] );
            $responseBody = json_decode( $response->getBody()->getContents(), true );
            return [
                'data' => $responseBody['data'],
                'total' => $responseBody['total']
            ];
        } catch ( \Exception $e ) {
            throw new \Exception( $e->getMessage() );
        }
    }
}
