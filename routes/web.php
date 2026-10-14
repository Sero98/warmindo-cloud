<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/pesan', [PesananController::class, 'simpan']);

Route::get('/health', function () {
    try {
        DB::connection()->getPdo();
        return 'OK - Database Connected';
    } catch (\Exception $e) {
        return 'Database connection failed';
    }
});
