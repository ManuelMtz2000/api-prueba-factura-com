<?php

use App\Http\Controllers\CatalogsController;
use Illuminate\Support\Facades\Route;

Route::get('/uso-cfdi', [ CatalogsController::class, 'usoCfdi' ]);
Route::get('/regimen-fiscal', [ CatalogsController::class, 'regimenFiscal' ]);
Route::get('/bancos', [ CatalogsController::class, 'bancos' ]);
Route::get('/colonias', [ CatalogsController::class, 'getColonias' ]);
Route::get('/paises', [ CatalogsController::class, 'getPaises' ]);
Route::get('/tipos-documentos', [ CatalogsController::class, 'getTiposDocumentos' ]);
Route::get('/metodos-pago', [ CatalogsController::class, 'getPaymentMethods' ]);
Route::get('/monedas', [ CatalogsController::class, 'getMonedas' ]);
Route::get('/unidades', [ CatalogsController::class, 'getUnidades' ]);
Route::get('/series', [ CatalogsController::class, 'getSeries' ]);
Route::get('/conceptos', [ CatalogsController::class, 'getConceptos' ]);
Route::get('/metodo-pago', [ CatalogsController::class, 'getMetodoPago' ]);
Route::get('/impuestos', [ CatalogsController::class, 'getImpuestos' ]);