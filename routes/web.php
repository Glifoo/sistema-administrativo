<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\PlanesController;
use Illuminate\Support\Facades\Route;

Route::controller(InicioController::class)->group(function () {
    Route::get('/', 'index')
        ->name('inicio');
});

Route::get('./usuario/login', function () {
    return redirect('/usuario/login');
})->name('usuariologin');

Route::controller(PlanesController::class)->group(function () {
    Route::get('/productos', 'index')
        ->name('planes');
});