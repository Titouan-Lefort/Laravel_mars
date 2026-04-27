<?php

use App\Http\Controllers\RegistreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('registre.index');
});

Route::get('/registre', [RegistreController::class, 'index'])->name('registre.index');
