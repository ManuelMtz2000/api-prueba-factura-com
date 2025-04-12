<?php

namespace App\Http\Controllers;

use App\DTO\CFDIDto;
use App\DTO\CreateCFDIDto;
use App\Services\CFDIService;
use Illuminate\Http\Request;

class CFDIController extends Controller
{
    private Request $request;
    protected $cfdiService;

    public function __construct( Request $request, CFDIService $cfdiService )
    {
        $this->request = $request;
        $this->cfdiService = $cfdiService;
    }

    public function index()
    {
        $cfdiDto = CFDIDto::fromRequest( $this->request->query() );
        $data = $this->cfdiService->index( $cfdiDto );
        
        return response()->json( $data, 200 );
    }

    public function add()
    {
        $params = CreateCFDIDto::fromRequest( $this->request->all() );
        $data = $this->cfdiService->add( $params );
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function cancel( string $UUID )
    {
        $params = $this->request->all();
        $data = $this->cfdiService->cancel( $UUID, $params );
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function sendEmail( string $UUID )
    {
        $data = $this->cfdiService->sendEmail( $UUID );
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }
}
