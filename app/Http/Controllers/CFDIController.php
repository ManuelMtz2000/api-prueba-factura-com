<?php

namespace App\Http\Controllers;

use App\Models\CFDI;
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
        $this->cfdiService->index( $this->request->all() );
    }
}
