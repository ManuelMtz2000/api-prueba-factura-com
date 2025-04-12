<?php

use App\Http\Controllers\CFDIController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ CFDIController::class, 'index' ] );
Route::post('/', [ CFDIController::class, 'add' ]);
Route::patch('/{UUID}/cancel', [ CFDIController::class, 'cancel' ]);
Route::get('/{UUID}/email', [ CFDIController::class, 'sendEmail' ]);