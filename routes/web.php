<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\RumahIbadahController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jenis', [JenisController::class, 'index']);
Route::post('/jenis', [JenisController::class, 'store']);
Route::get('/jenis/{id}', [JenisController::class, 'show']);
Route::put('/jenis/{id}', [JenisController::class, 'update']);
Route::delete('/jenis/{id}', [JenisController::class, 'destroy']);

Route::get('/regulasi', [RegulasiController::class, 'index']);
Route::post('/regulasi', [RegulasiController::class, 'store']);
Route::get('/regulasi/{id}', [RegulasiController::class, 'show']);
Route::put('/regulasi/{id}', [RegulasiController::class, 'update']);
Route::delete('/regulasi/{id}', [RegulasiController::class, 'destroy']);

Route::get('/rumah-ibadah', [RumahIbadahController::class, 'index']);
Route::post('/rumah-ibadah', [RumahIbadahController::class, 'store']);
Route::get('/rumah-ibadah/{id}', [RumahIbadahController::class, 'show']);
Route::put('/rumah-ibadah/{id}', [RumahIbadahController::class, 'update']);
Route::delete('/rumah-ibadah/{id}', [RumahIbadahController::class, 'destroy']);