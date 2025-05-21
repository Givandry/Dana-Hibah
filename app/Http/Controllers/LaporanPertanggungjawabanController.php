<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanPertanggungjawaban;
use App\Http\Controllers\Controller;


class LaporanPertanggungjawabanController extends Controller
{
    public function index(Request $request)
    {
        $query = LaporanPertanggungjawaban::query();
        $laporanPertanggungjawabans = $query->paginate(5);
        return response()->json($laporanPertanggungjawabans);
    }

    public function show($nomorPengajuan)
    {
        $laporanPertanggungjawaban = LaporanPertanggungjawaban::where('nomor_pengajuan', $nomorPengajuan)->first();
        if (!$laporanPertanggungjawaban) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($laporanPertanggungjawaban);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_pengajuan' => 'required|exists:pengajuan_proposal,nomor_pengajuan',
            'waktu' => 'required',
            'file' => 'required',
            'check' => 'required',
            'catatan' => 'required',
        ]);

        $laporanPertanggungjawaban = LaporanPertanggungjawaban::create($validatedData);
        return response()->json($laporanPertanggungjawaban, 201);
    }

    public function update(Request $request, $nomorPengajuan)
    {
        $laporanPertanggungjawaban = LaporanPertanggungjawaban::where('nomor_pengajuan', $nomorPengajuan)->first();
        if (!$laporanPertanggungjawaban) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
            'waktu' => 'required',
            'file' => 'required',
            'check' => 'required',
            'catatan' => 'required',
        ]);

        $laporanPertanggungjawaban->update($validatedData);
        return response()->json($laporanPertanggungjawaban);
    }

    public function destroy($nomorPengajuan)
    {
        $laporanPertanggungjawaban = LaporanPertanggungjawaban::where('nomor_pengajuan', $nomorPengajuan);
        if (!$laporanPertanggungjawaban) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $laporanPertanggungjawaban->delete();
        return response()->json(['message' => 'Record deleted successfully'], 200);
    }
}
