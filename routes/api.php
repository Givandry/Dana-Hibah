<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\RumahIbadahController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\PengajuanProposalController;
use App\Http\Controllers\LaporanPertanggungjawabanController;
use App\Http\Controllers\PersyaratanProposalController;
use App\Http\Controllers\BerkasPengajuanController;
use App\Http\Controllers\BerkasPencairanController;
use App\Http\Controllers\CatatanPengajuanController;
use App\Http\Controllers\PencairanController;

Route::get('/', function (Request $request) {
    return "abc";
});


Route::prefix('rumah-ibadah')->group(function () {
    Route::get('/', [RumahIbadahController::class, 'index']);
    Route::post('/', [RumahIbadahController::class, 'store']);
    Route::get('/{id}', [RumahIbadahController::class, 'show']);
    Route::put('/{id}', [RumahIbadahController::class, 'update']);
    Route::delete('/{id}', [RumahIbadahController::class, 'destroy']);
});

Route::prefix('pengurus')->group(function () {
    Route::get('/', [PengurusController::class, 'index']);
    Route::post('/', [PengurusController::class,'store']);
    Route::get('/{id}', [PengurusController::class, 'show']);
    Route::put('/{id}', [PengurusController::class, 'update']);
    Route::delete('/{id}', [PengurusController::class, 'destroy']);
});

Route::prefix('pengajuan-proposal')->group(function () {
    Route::get('/', [PengajuanProposalController::class, 'index']);
    Route::get('/{nomorPengajuan}', [PengajuanProposalController::class, 'show']);
    Route::post('/', [PengajuanProposalController::class, 'store']);
    Route::put('/{nomorPengajuan}', [PengajuanProposalController::class, 'update']);
    Route::delete('/{nomorPengajuan}', [PengajuanProposalController::class, 'destroy']);
 });

Route::prefix('laporan-pertanggungjawaban')->group(function () {
    Route::get('/', [LaporanPertanggungjawabanController::class, 'index']);
    Route::post('/', [LaporanPertanggungjawabanController::class,'store']);
    Route::get('/{nomorPengajuan}', [LaporanPertanggungjawabanController::class,'show']);
    Route::put('/{nomorPengajuan}', [LaporanPertanggungjawabanController::class, 'update']);
    Route::delete('/{nomorPengajuan}', [LaporanPertanggungjawabanController::class, 'destroy']);
});

Route::prefix('persyaratan-proposal')->group(function () {
    Route::get('/', [PersyaratanProposalController::class, 'index']);
    Route::post('/', [PersyaratanProposalController::class,'store']);
    Route::get('/{id}', [PersyaratanProposalController::class,'show']);
    Route::put('/{id}', [PersyaratanProposalController::class, 'update']);
    Route::delete('/{id}', [PersyaratanProposalController::class, 'destroy']);
});

Route::prefix('berkas-pengajuan')->group(function () {
    Route::get('/', [BerkasPengajuanController::class, 'index']);
    Route::post('/', [BerkasPengajuanController::class,'store']);
    Route::get('/{id}', [BerkasPengajuanController::class,'show']);
    Route::put('/{id}', [BerkasPengajuanController::class, 'update']);
    Route::delete('/{id}', [BerkasPengajuanController::class, 'destroy']);
});

Route::prefix('berkas-pencairan')->group(function () {
    Route::get('/', [BerkasPencairanController::class, 'index']);
    Route::post('/', [BerkasPencairanController::class,'store']);
    Route::get('/{id}', [BerkasPencairanController::class,'show']);
    Route::put('/{id}', [BerkasPencairanController::class, 'update']);
    Route::delete('/{id}', [BerkasPencairanController::class, 'destroy']);
});

Route::prefix('catatan-pengajuan')->group(function () {
     Route::get('/', [CatatanPengajuanController::class, 'index']);
    Route::post('/', [CatatanPengajuanController::class,'store']);
    Route::get('/{nomorPengajuan}', [CatatanPengajuanController::class,'show']);
    Route::put('/{nomorPengajuan}', [CatatanPengajuanController::class, 'update']);
    Route::delete('/{nomorPengajuan}', [CatatanPengajuanController::class, 'destroy']);
});

Route::prefix('pencairan')->group(function () {
    Route::get('/', [PencairanController::class, 'index']);
    Route::post('/', [PencairanController::class,'store']);
    Route::get('/{nomorPengajuan}', [PencairanController::class,'show']);
    Route::put('/{NomorPengajuan}', [PencairanController::class, 'update']);
    Route::delete('/{nomorPengajuan}', [PencairanController::class, 'destroy']);
});

Route::prefix('regulasi')->group(function () {
    Route::get('/', [RegulasiController::class, 'index']); 
    Route::post('/', [RegulasiController::class,'store']); 
    Route::get('/{id}', [RegulasiController::class,'show']);
    Route::put('/{id}', [RegulasiController::class, 'update']); 
    Route::delete('/{id}', [RegulasiController::class, 'destroy']);
});

Route::prefix('jenis')->group(function (){
    Route::get('/', [JenisController::class, 'index']);
    Route::post('/', [JenisController::class,'store']);
    Route::get('/{id}', [JenisController::class,'show']); 
    Route::put('/{id}', [JenisController::class, 'update']);
    Route::delete('/{id}', [JenisController::class, 'destroy']); 
});

