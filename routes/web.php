<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group( function () {
    Route::prefix('clients')->group( function () {
        require __DIR__.'/modules/clients.php';
    });

    Route::prefix('cfdi')->group( function () {
        require __DIR__.'/modules/cfdi.php';
    });
});