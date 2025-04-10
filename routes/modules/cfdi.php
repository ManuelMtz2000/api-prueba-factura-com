<?php

use App\Http\Controllers\CFDIController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ CFDIController::class, 'index' ] );