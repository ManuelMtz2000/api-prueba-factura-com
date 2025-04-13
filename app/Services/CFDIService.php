<?php

namespace App\Services;

use App\DTO\CFDIDto;
use App\DTO\CreateCFDIDto;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

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

    public function add( CreateCFDIDto $params )
    {
        try {
            $response = $this->client->request( 'POST', '/api/v4/cfdi40/create', [
                'json' => $params->jsonSerialize()
            ]);
            
            $responseBody = json_decode( $response->getBody()->getContents(), true );
            if ( $responseBody['response'] == 'error' ) {
                throw new \Exception( $responseBody['message']['message'] );
            }

            $data = [
                'UUID' => $responseBody['UUID'],
                'message' => $responseBody['message']
            ];

            return $data;
        } catch ( \Exception $e ) {
            Log::info( $e->getMessage() );
            throw new \Exception( $e->getMessage() );
        }
    }

    public function cancel( string $UUID, array $params ) {
        try {
            $response = $this->client->request( 'POST', '/api/v4/cfdi40/' . $UUID . '/cancel', [
                'json' => $params
            ]);

            $responseBody = json_decode( $response->getBody()->getContents(), true );
            
            if ( $responseBody['response'] == 'error' ) {
                throw new \Exception( $responseBody['message'] );
            }

            return $responseBody['message'];
        } catch ( \Exception $e ) {
            throw new \Exception( $e->getMessage() );
        }
    }

    public function sendEmail( string $UUID )
    {
        try {
            $response = $this->client->request( 'GET', '/api/v4/cfdi40/' . $UUID . '/email' );
            $responseBody = json_decode( $response->getBody()->getContents(), true );

            if ( $responseBody['response'] == 'error' ) {
                throw new \Exception( $responseBody['message'] );
            }
            
            return $responseBody['message'];
        } catch ( \Exception $e ) {
            throw new \Exception( $e->getMessage() );
        }
    }

    public function lastCfdi( string $UUID )
    {
        try {
            $response = $this->client->request( 'GET', 'admin/cancelation/filter/last/40/F/' . $UUID );
            $responseBody = json_decode( $response->getBody()->getContents(), true );
            return $responseBody['data'];
        } catch ( \Exception $e ) {
            throw new \Exception( $e->getMessage() );
        }
    }
}
