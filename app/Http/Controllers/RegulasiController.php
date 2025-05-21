<?php

namespace App\Http\Controllers;

use App\Models\Regulasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RegulasiController extends Controller
{
    public function index()
    {
        $query = Regulasi::query();
        $regulasis = $query->paginate(5);
        return response()->json($regulasis);
    }

    public function show($id)
    {
        $regulasi = Regulasi::find($id);
        if (!$regulasi) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($regulasi);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
             'judul' => 'required',
             'file' => 'required',
             'aktif' => 'required',
        ]);

        $regulasi = Regulasi::create($validatedData);
        return response()->json($regulasi, 201);
    }

    public function update(Request $request, $id)
    {
        $regulasi = Regulasi::find($id);
        if (!$regulasi) {
            return response()->json(['error' => 'Record not found'], 404);
        }

    $validatedData = $request->validate([
            'judul' => 'required',
            'file' => 'required',
            'aktif' => 'required',
    ]);

        $regulasi->update($validatedData);
        return response()->json($regulasi);
    }

    public function destroy($id)
    {
        $regulasi = Regulasi::find($id);
        if (!$regulasi) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $regulasi->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}