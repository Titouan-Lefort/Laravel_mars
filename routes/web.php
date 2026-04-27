<?php

use App\Http\Controllers\RegistreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('registre.index');
});

Route::get('/registre', [RegistreController::class, 'index'])->name('registre.index');
Route::get('/registre/{registre}', [RegistreController::class, 'show'])->name('registre.show');

Route::get('/biomes', function () {
    return 'Page des biomes';
})->name('biomes.index');
