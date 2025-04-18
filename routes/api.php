<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('clients')->group( function () {
    require __DIR__.'/modules/clients.php';
});

Route::prefix('cfdi')->group( function () {
    require __DIR__.'/modules/cfdi.php';
});

Route::prefix('catalogs')->group( function () {
    require __DIR__.'/modules/catalogs.php';
});
