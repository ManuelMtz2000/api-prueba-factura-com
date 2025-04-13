<?php

namespace App\Services;

use GuzzleHttp\Client;

class CatalogsService
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

    public function useCfdi()
    {
        try {
            $response = $this->client->request('GET', '/api/v4/catalogo/UsoCfdi');
            $responseBody = json_decode($response->getBody()->getContents(), true);
            return $responseBody;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function regimenFiscal()
    {
        try {
            $response = $this->client->request('GET', '/api/v3/catalogo/RegimenFiscal');
            $responseBody = json_decode($response->getBody()->getContents(), true);
            return $responseBody['data'];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function bancos()
    {
        try {
            $response = $this->client->request('GET', '/api/payroll/catalogos/bancos');
            $responseBody = json_decode($response->getBody()->getContents(), true);
            return $responseBody;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getColonias(string $code)
    {
        try {
            $response = $this->client->request('GET', '/webservices/getCodPos', [
                'query' => [
                    'cp' => $code
                ]
            ]);
            $responseBody = json_decode($response->getBody()->getContents(), true);

            if (isset($responseBody['colonias'])) {
                return $responseBody['colonias'];
            }

            return [];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getPaises()
    {
        try {
            $response = $this->client->request('GET', '/api/v3/catalogo/Pais');
            $responseBody = json_decode($response->getBody()->getContents(), true);

            if ($responseBody['response'] == 'error') {
                throw new \Exception($responseBody['message']);
            }

            return $responseBody['data'];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getTiposDocumentos()
    {
        try {
            $data = [
                [
                    'clave' => 'factura_hotel',
                    'tipo' => 'Factura para hoteles'
                ],
                [
                    'clave' => 'honorarios',
                    'tipo' => 'Recibo de honorarios'
                ],
                [
                    'clave' => 'donativos',
                    'tipo' => 'Donativo'
                ],
                [
                    'clave' => 'arrendamiento',
                    'tipo' => 'Recibo de arrendamiento'
                ],
                [
                    'clave' => 'nota_credito',
                    'tipo' => 'Nota de crédito'
                ],
                [
                    'clave' => 'nota_debito',
                    'tipo' => 'Nota de débito'
                ],
                [
                    'clave' => 'nota_devolucion',
                    'tipo' => 'Nota de devolución'
                ],
                [
                    'clave' => 'carta_porte',
                    'tipo' => 'Carta porte'
                ],
                [
                    'clave' => 'carta_porte_ingreso',
                    'tipo' => 'Carta porte de Ingreso'
                ],
                [
                    'clave' => 'pago',
                    'tipo' => 'Pago'
                ],
                [
                    'clave' => 'retencion',
                    'tipo' => 'Retención'
                ]
            ];

            return $data;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getPaymentMethods()
    {
        try {
            $response = $this->client->request('GET', '/api/payroll/catalogos/metodopago');
            $responseBody = json_decode($response->getBody()->getContents(), true);
            return $responseBody;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getMonedas()
    {
        try {
            $response = $this->client->request('GET', '/api/v3/catalogo/Moneda');
            $responseBody = json_decode($response->getBody()->getContents(), true);
            return $responseBody['data'];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getUnidades()
    {
        try {
            $response = $this->client->request('GET', '/api/v3/catalogo/ClaveUnidad');
            $responseBody = json_decode($response->getBody()->getContents(), true);
            return $responseBody['data'];
        } catch (\Exception $e) {
            throw new  \Exception($e->getMessage());
        }
    }

    public function getSeries()
    {
        try {
            $response = $this->client->request('GET', '/api/v4/series');
            $responseBody = json_decode($response->getBody()->getContents(), true);
            return $responseBody['data'];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getConceptos()
    {
        try {
            $response = $this->client->request('GET', '/api/v3/products/list');
            $responseBody = json_decode($response->getBody()->getContents(), true);
            return $responseBody['data'];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getMetodoPago()
    {
        try {
            $response = $this->client->request('GET', '/admin/cfdiv33/catalogos/metodopagos');
            $responseBody = json_decode($response->getBody()->getContents(), true);
            dd($responseBody);
            return $responseBody['data'];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getImpuestos()  //? API NO REGRESA INFORMACIÓN, POR LO QUE SE OPTO POR ESTO: https://sandbox.factura.com/admin/accountTaxes
    {
        try {
            $arrayData = [
                [
                    "tax_id" => 1387,
                    "tax_category" => "general",
                    "tax_type" => "traslado",
                    "tax_name" => "IVA",
                    "tax_enabled_view" => 1,
                    "tax_account_id" => 1636,
                    "tax_ratesAndQuotas" => [
                        ["type" => "rate", "value" => "16"],
                        ["type" => "rate", "value" => "8"],
                        ["type" => "rate", "value" => "4"],
                        ["type" => "rate", "value" => "0"]
                    ],
                    "tax_default" => ["type" => "rate", "value" => "16"],
                    "tax_decimals" => "4"
                ],
                [
                    "tax_id" => 5482,
                    "tax_category" => "general",
                    "tax_type" => "traslado",
                    "tax_name" => "IEPS",
                    "tax_enabled_view" => 1,
                    "tax_account_id" => 1636,
                    "tax_ratesAndQuotas" => [
                        ["type" => "rate", "value" => "160"],
                        ["type" => "rate", "value" => "53"],
                        ["type" => "rate", "value" => "50"],
                        ["type" => "rate", "value" => "30.4"],
                        ["type" => "rate", "value" => "26.5"],
                        ["type" => "rate", "value" => "25"],
                        ["type" => "rate", "value" => "9"],
                        ["type" => "rate", "value" => "8"],
                        ["type" => "rate", "value" => "7"],
                        ["type" => "rate", "value" => "6"]
                    ],
                    "tax_default" => ["type" => "rate", "value" => "160"],
                    "tax_decimals" => "2"
                ],
                [
                    "tax_id" => 9577,
                    "tax_category" => "general",
                    "tax_type" => "traslado",
                    "tax_name" => "Internacional",
                    "tax_enabled_view" => 1,
                    "tax_account_id" => 1636,
                    "tax_ratesAndQuotas" => [
                        ["type" => "rate", "value" => "4"],
                        ["type" => "rate", "value" => "0"]
                    ],
                    "tax_default" => ["type" => "rate", "value" => "4"],
                    "tax_decimals" => "6"
                ],
                [
                    "tax_id" => 13672,
                    "tax_category" => "general",
                    "tax_type" => "retencion",
                    "tax_name" => "RET. IVA",
                    "tax_enabled_view" => 1,
                    "tax_account_id" => 1636,
                    "tax_ratesAndQuotas" => [
                        ["type" => "rate", "value" => "16"],
                        ["type" => "rate", "value" => "10.6666"],
                        ["type" => "rate", "value" => "8"],
                        ["type" => "rate", "value" => "5.3333"]
                    ],
                    "tax_default" => ["type" => "rate", "value" => "16"],
                    "tax_decimals" => "6"
                ],
                [
                    "tax_id" => 17767,
                    "tax_category" => "general",
                    "tax_type" => "retencion",
                    "tax_name" => "RET. ISR",
                    "tax_enabled_view" => 1,
                    "tax_account_id" => 1636,
                    "tax_ratesAndQuotas" => [
                        ["type" => "rate", "value" => "21.36"],
                        ["type" => "rate", "value" => "17.92"],
                        ["type" => "rate", "value" => "16"],
                        ["type" => "rate", "value" => "10.88"]
                    ],
                    "tax_default" => ["type" => "rate", "value" => "21.36"],
                    "tax_decimals" => "6"
                ]
            ];
            return $arrayData;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
