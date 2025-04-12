<?php

namespace App\Http\Controllers;

use App\DTO\CreateClientDto;
use App\DTO\UpdateClientDto;
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
        $data = $this->clientsService->index();
        return response()->json([
            'status' => 'sucess',
            'data' => $data
        ], 200 );
    }

    public function add()
    {
        $params = CreateClientDto::fromRequest( $this->request->all() );
        $data = $this->clientsService->add( $params );
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function show( string $param )
    {
        $data = $this->clientsService->search( $param );
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function update( string $UID, UpdateClientDto $params )
    {
        $params = UpdateClientDto::fromRequest( $this->request->all() );
        $data = $this->clientsService->update( $UID, $params );
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function delete( string $UID )
    {
        $this->clientsService->delete( $UID );
        return response()->json([
            'status' => 'success',
            'message' => 'Cliente eliminado correctamente'
        ], 200);
    }
}
