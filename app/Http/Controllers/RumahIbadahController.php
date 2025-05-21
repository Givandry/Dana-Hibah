<?php

namespace App\Http\Controllers;

use App\Models\RumahIbadah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RumahIbadahController extends Controller
{
    public function index(Request $request)
    {
        $query = RumahIbadah::query();
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('nama_rumah_ibadah', 'like', "%$search%")
                    ->orWhere('kelurahan', 'like', "%$search%")
                    ->orWhere('kecamatan', 'like', "%$search%");
            });
        }

        $rumahIbadahs = $query->paginate(5);
        return response()->json($rumahIbadahs);
    }

    public function show($id)
    {
        $rumahIbadah = RumahIbadah::find($id);
        if (!$rumahIbadah) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($rumahIbadah);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_rumah_ibadah' =>'required',
            'alamat' =>'required',
            'kelurahan' =>'required',
            'kecamatan' =>'required',
            'no_hp' =>'required',
            'email' =>'required',
            'jenis_id' =>'required|exists:jenis,id',
        ]);

        $rumahIbadah = RumahIbadah::create($validatedData);
        return response()->json($rumahIbadah, 201);
    }

    public function update(Request $request, $id)
    {
        $rumahIbadah = RumahIbadah::find($id);
        if (!$rumahIbadah) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
            'nama_rumah_ibadah' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'jenis_id' => 'required|exists:jenis,id',
        ]);

        $rumahIbadah->update($validatedData);
        return response()->json($rumahIbadah);
    }

    public function destroy($id)
    {
        $rumahIbadah = RumahIbadah::find($id);
        if (!$rumahIbadah) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $rumahIbadah->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}