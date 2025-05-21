<?php

namespace App\Http\Controllers;

use App\Models\BerkasPengajuan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerkasPengajuanController extends Controller
{
     public function index()
     {
        $query = BerkasPengajuan::query();
        $berkasPengajuans = $query->paginate(5);
        return response()->json($berkasPengajuans);
     }

     public function show($id)
     {
        $berkasPengajuan = BerkasPengajuan::find($id);
        if (!$berkasPengajuan) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($berkasPengajuan);
     }

     public function store(Request $request)
     {
        $validatedData = $request->validate([
             'nomor_pengajuan' => 'required|exists:pengajuan_proposal,nomor_pengajuan',
             'persyaratan_proposal_id' => 'required|exists:persyaratan_proposal,id',
             'nama_persyaratan' => 'required',
             'file' => 'required',
             'check' => 'required'
        ]);
        $berkasPengajuan = BerkasPengajuan::create($validatedData);
        return response()->json($berkasPengajuan, 201);
     }

     public function update(Request $request, $id)
     {
        $berkasPengajuan = BerkasPengajuan::find($id);
        if (!$berkasPengajuan) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
             'nama_persyaratan' => 'required',
             'file' => 'required',
             'check' => 'required'
        ]);

        $berkasPengajuan->update($validatedData);
        return response()->json($berkasPengajuan);
     }

     public function destroy($id)
     {
        $berkasPengajuan = BerkasPengajuan::find($id);
        if (!$berkasPengajuan) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $berkasPengajuan->delete();
        return response()->json(['message' => 'Record deleted successfully'], 200);
     }

}
