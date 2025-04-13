<?php

namespace App\Http\Controllers;

use App\Services\CatalogsService;
use Illuminate\Http\Request;

class CatalogsController extends Controller
{
    private Request $request;
    protected $catalogsService;

    public function __construct( Request $request, CatalogsService $catalogsService )
    {
        $this->request = $request;
        $this->catalogsService = $catalogsService;
    }
    
    public function usoCfdi()
    {
        $data = $this->catalogsService->useCfdi();
        return response()->json( $data, 200 );
    }

    public function regimenFiscal()
    {
        $data = $this->catalogsService->regimenFiscal();
        return response()->json( $data, 200 );
    }

    public function bancos()
    {
        $data = $this->catalogsService->bancos();
        return response()->json( $data, 200 );
    }

    public function getColonias()
    {
        $code = $this->request->get( 'code' );
        $data = $this->catalogsService->getColonias( $code );
        return response()->json( $data, 200 );
    }

    public function getPaises()
    {
        $data = $this->catalogsService->getPaises();
        return response()->json( $data, 200 );
    }

    public function getTiposDocumentos()
    {
        $data = $this->catalogsService->getTiposDocumentos();
        return response()->json( $data, 200 );
    }

    public function getPaymentMethods()
    {
        $data = $this->catalogsService->getPaymentMethods();
        return response()->json( $data, 200 );
    }

    public function getMonedas()
    {
        $data = $this->catalogsService->getMonedas();
        return response()->json( $data, 200 );
    }

    public function getUnidades()
    {
        $data = $this->catalogsService->getUnidades();
        return response()->json( $data, 200 );
    }

    public function getSeries()
    {
        $data = $this->catalogsService->getSeries();
        return response()->json( $data, 200 );
    }

    public function getConceptos()
    {
        $data = $this->catalogsService->getConceptos();
        return response()->json( $data, 200 );
    }

    public function getMetodoPago()
    {
        $data = $this->catalogsService->getMetodoPago();
        return response()->json( $data, 200 );
    }

    public function getImpuestos()
    {
        $data = $this->catalogsService->getImpuestos();
        return response()->json( $data, 200 );
    }
}