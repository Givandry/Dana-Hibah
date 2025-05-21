<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class JenisController extends Controller
{
    public function index(Request $request)
    {
        $query = Jenis::query();
        $jenises = $query->paginate(5);
        return response()->json($jenises);
    }

    public function show($id){
        $jenis = Jenis::find($id);
        if (!$jenis) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($jenis);
     }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
             'jenis_rumah_ibadah' =>'required',
        ]);

        $jenis = Jenis::create($validatedData);
        return response()->json($jenis, 201);
    }

    public function update(Request $request, $id)
    {
        $jenis = Jenis::find($id);
        if (!$jenis) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
            'jenis_rumah_ibadah' => 'required',
        ]);

        $jenis->update($validatedData);
        return response()->json($jenis);
    }

    public function destroy($id)
    {
        $jenis = Jenis::find($id);
        if (!$jenis) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $jenis->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}