<?php

namespace App\Http\Controllers;

use App\DTO\CFDIDto;
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
}
