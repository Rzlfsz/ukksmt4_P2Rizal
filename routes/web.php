<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:Admin|Petugas'])->group(function () {
    Route::get('/struk-parkir/{transaksi}', \App\Http\Controllers\StrukParkirController::class)
        ->name('struk-parkir.show');
});
