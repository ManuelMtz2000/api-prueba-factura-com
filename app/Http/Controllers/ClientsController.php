<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\ClientsService;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    private Request $request;
    protected $clientsService;

    public function __construct( Request $request, ClientsService $clientsService )
    {
        $this->request = $request;
        $this->clientsService = $clientsService;
    }

    public function index() 
    {
        $this->clientsService->index( $this->request->all() );
    }
}
