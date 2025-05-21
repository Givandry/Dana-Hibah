<?php

namespace App\Http\Controllers;

use App\Models\CatatanPengajuan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatatanPengajuanController extends Controller
{
    public function index()
    {
        $query = CatatanPengajuan::query();
        $catatanPengajuans = $query->paginate(5);
        return response()->json($catatanPengajuans);
    }

    public function show($nomorPengajuan)
    {
        $catatanPengajuan = CatatanPengajuan::where('nomor_pengajuan', $nomorPengajuan)->first();
        if (!$catatanPengajuan) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($catatanPengajuan);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_pengajuan' => 'required|exists:pengajuan_proposal,nomor_pengajuan',
            'catatan' => 'required',
            'waktu' => 'required',
        ]);

        $catatanPengajuan = CatatanPengajuan::create($validatedData);
        return response()->json($catatanPengajuan, 201);
    }

    public function update(Request $request, $nomorPengajuan)
    {
        $catatanPengajuan = CatatanPengajuan::where('nomor_pengajuan', $nomorPengajuan)->first();
        if (!$catatanPengajuan) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
            'catatan' => 'required',
            'waktu' => 'required',
        ]);

        $catatanPengajuan->update($validatedData);
        return response()->json($catatanPengajuan);
    }

    public function destroy($nomorPengajuan)
    {
        $catatanPengajuan = CatatanPengajuan::where('nomor_pengajuan', $nomorPengajuan);
        if (!$catatanPengajuan) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $catatanPengajuan->delete();


        return response()->json(['message' => 'Record deleted successfully'], 200);
    }
}
