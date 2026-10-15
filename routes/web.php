<?php

use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [PesananController::class, 'index'])->name('home');

Route::post('/pesan', [PesananController::class, 'simpan']);

Route::get('/health', function () {
    try {
        DB::connection()->getPdo();

        return 'OK - Database Connected';
    } catch (Exception $e) {
        return 'Database connection failed';
    }
});
