<?php

namespace App\Http\Controllers;

use App\Models\BerkasPencairan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerkasPencairanController extends Controller
{
    public function index()
    { 
        $query = BerkasPencairan::query();
        $berkasPencairans = $query->paginate(5);
        return response()->json($berkasPencairans);
    }

    public function show($id)
    {
        $berkasPencairan = BerkasPencairan::find($id);
        if (!$berkasPencairan) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($berkasPencairan);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_pengajuan' => 'required|exists:pengajuan_proposal,nomor_pengajuan',
            'persyaratan_proposal_id' => 'required|exists:persyaratan_proposal,id',
            'file' => 'required',
            'check' => 'required',
        ]);

        $berkasPencairan = BerkasPencairan::create($validatedData);
        return response()->json($berkasPencairan, 201);
    }

    public function update(Request $request, $id)
    {
        $berkasPencairan = BerkasPencairan::find($id);
        if (!$berkasPencairan) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
            'file' => 'required',
            'check' => 'required',
        ]);

        $berkasPencairan->update($validatedData);
        return response()->json($berkasPencairan);
    }

    public function destroy($id)
    {
        $berkasPencairan = BerkasPencairan::find($id);
        if (!$berkasPencairan) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $berkasPencairan->delete();
        return response()->json(['message' => 'Record deleted successfully']);
    }
}
