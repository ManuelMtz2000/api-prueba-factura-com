<?php

use App\Http\Controllers\ClientsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ ClientsController::class, 'index' ] );
Route::get('/show/{param}', [ ClientsController::class, 'show' ]);