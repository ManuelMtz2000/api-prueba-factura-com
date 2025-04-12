<?php

use App\Http\Controllers\ClientsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ ClientsController::class, 'index' ] );
Route::post('/', [ ClientsController::class, 'add' ] );
Route::patch('/{UID}', [ ClientsController::class, 'update' ]);
Route::delete('/{UID}', [ ClientsController::class, 'delete' ]);
Route::get('/{param}', [ ClientsController::class, 'show' ]);