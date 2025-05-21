<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengurus;


class PengurusController extends Controller
{
    public function index(Request $request)
    {
    $query = Pengurus::query();
    if ($request->has('search')) {
        $search = $request->search;
        $query->where(function ($query) use ($search) {
            $query->where('nama_lengkap', 'like', "%$search%")
                ->orWhere('kelurahan', 'like', "%$search%")
                ->orWhere('kecamatan', 'like', "%$search%");
        });
    }

    $penguruses = $query->paginate(5);
    return response()->json($penguruses);
    }

    public function show($id)
    {
        $pengurus = Pengurus::find($id);
        if (!$pengurus) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        return response()->json($pengurus);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' =>'required',
            'jabatan' =>'required',
            'alamat' =>'required',
            'kelurahan' =>'required',
            'kecamatan' =>'required',
            'no_hp' =>'required',
            'email' =>'required',
            'jabatan' =>'required',
            'rumah_ibadah_id' =>'required|exists:rumah_ibadah,id',
            'password' =>'required',
        ]);

        $pengurus = Pengurus::create($validatedData);
        return response()->json($pengurus, 201);
    }

    public function update(Request $request, $id)
    {
        $pengurus = Pengurus::find($id);
        if (!$pengurus) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
            'nama_lengkap' =>'required',
            'alamat' =>'required',
            'kelurahan' =>'required',
            'kecamatan' =>'required',
            'no_hp' =>'required',
            'email' =>'required',
            'jabatan' =>'required',
            'rumah_ibadah_id' =>'required|exists:rumah_ibadah,id',
            'password' =>'required',
        ]);

        $pengurus->update($validatedData);
        return response()->json($pengurus);
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::find($id);
        if (!$pengurus) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $pengurus->delete();
        return response()->json(['message' => 'Record deleted successfully']);
    }
}