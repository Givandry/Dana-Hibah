<?php

namespace App\Http\Controllers;

use App\Models\Pencairan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PencairanController extends Controller
{
     public function index(Request $request)
     {
         $query = Pencairan::query();
         if ($request->has('search')) {
        $search = $request->search;
        $query->where(function ($query) use ($search) {
            $query->where('dana_hibah_disetujui', 'like', "%$search%")
                ->orWhere('disposisi_walikota', 'like', "%$search%")
                ->orWhere('disposisi_sekda', 'like', "%$search%")
                 ->orWhere('disposisi_assisten', 'like', "%$search%")
                ->orWhere('disposisi_kabag', 'like', "%$search%")
                ->orWhere('sk_penetapan_walikota', 'like', "%$search%")
                ->orWhere('nphd', 'like', "%$search%");
            });

         }

        $pencairans = $query->paginate(5);
        return response()->json($pencairans);
     }

     public function show($nomorPengajuan)
     {
        $pencairan = Pencairan::where('nomor_pengajuan', $nomorPengajuan)->first();
        if (!$pencairan) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        return response()->json($pencairan);
     }

     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'nomor_pengajuan' =>'required|exists:pengajuan_proposal,nomor_pengajuan',
             'catatan' =>'required',
             'waktu' =>'required',
             'dana_hibah_disetujui' =>'required',
             'disposisi_walikota' => 'required',
             'disposisi_sekda' => 'required',
             'disposisi_assisten' => 'required',
             'disposisi_kabag' => 'required',
             'sk_penetapan_walikota' => 'required',
             'nphd' => 'required',
         ]);

         $pencairan = Pencairan::create($validatedData);
         return response()->json($pencairan, 201);
     }

     public function update(Request $request, $nomorPengajuan)
     {
        $pencairan = Pencairan::find($nomorPengajuan);
        if (!$pencairan) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
             'catatan' =>'required',
             'waktu' =>'required',
             'dana_hibah_disetujui' =>'required',
             'disposisi_walikota' => 'required',
             'disposisi_sekda' => 'required',
             'disposisi_assisten' => 'required',
             'disposisi_kabag' => 'required',
             'sk_penetapan_walikota' => 'required',
             'nphd' => 'required',
         ]);

        $pencairan->update($validatedData);
        return response()->json($pencairan);
     }

     public function destroy($nomorPengajuan)
     {
        $pencairan = Pencairan::find($nomorPengajuan);
        if (!$pencairan) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $pencairan->delete();
        return response()->json(['message' => 'Record deleted successfully'], 200);
     }
}
