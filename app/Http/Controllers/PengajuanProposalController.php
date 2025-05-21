<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanProposal;
use App\Http\Controllers\Controller;



class PengajuanProposalController extends Controller
{
    public function index(Request $request)
    {
        $query = PengajuanProposal::query();
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('nomor_pengajuan', 'like', "%$search%");
            }   );
        }

        if ($request->has('status')){
            $status = $request->status;
            $query->where(function ($query) use ($status){
                $query->where('status_pengajuan', 'like', "%$status")
                ->orWhere('status_pencairan', 'like', "%$status");
            });

        }

        if ($request->has('disposisi')){
            $disposisi = $request->disposisi;
            $query->where(function ($query) use ($disposisi){
                $query->where('disposisi_walikota', 'like', "%$disposisi")
                ->orWhere('disposisi_sekda', 'like', "%$disposisi")
                ->orWhere('disposisi_assisten', 'like', "%$disposisi")
                ->orWhere('disposisi_kabag', 'like', "%$disposisi");
            });

        }

        $pengajuanProposals = $query->paginate(5);
        return response()->json($pengajuanProposals);
    }

    public function show($nomorPengajuan)
    {
        $pengajuanProposal = \App\Models\PengajuanProposal::where('nomor_pengajuan', $nomorPengajuan)->first();
        if (!$pengajuanProposal) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($pengajuanProposal);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_pengajuan' => 'required',
            'rumah_ibadah_id' =>'required|exists:rumah_ibadah,id',
            'waktu' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'jumlah_dana_hibah' => 'required',
            'status_pengajuan' => 'required',
            'status_pencairan' => 'required',
            'rekomendasi' => 'required',
            'disposisi_walikota' => 'required',
            'disposisi_sekda' => 'required',
            'disposisi_assisten' => 'required',
            'disposisi_kabag' => 'required',
        ]);

        $pengajuanProposal = PengajuanProposal::create($validatedData);
        return response()->json($pengajuanProposal, 201);
    }

    public function update(Request $request, $nomorPengajuan)
    {
        $pengajuanProposal = \App\Models\PengajuanProposal::where('nomor_pengajuan', $nomorPengajuan)->first();

        if (!$pengajuanProposal) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
            'nomor_pengajuan' => 'required',
            'rumah_ibadah_id' => 'required|exists:rumah_ibadah,id',
            'waktu' => 'required|date',
            'judul' => 'required',
            'deskripsi' => 'required',
            'jumlah_dana_hibah' => 'required',
            'status_pengajuan' => 'required',
            'status_pencairan' => 'required',
            'rekomendasi' => 'required|string',
            'disposisi_walikota' => 'required|boolean',
            'disposisi_sekda' => 'required|boolean',
            'disposisi_assisten' => 'required|boolean',
            'disposisi_kabag' => 'required|boolean',
        ]);

        $pengajuanProposal->update($validatedData);
        return response()->json($pengajuanProposal);
    }

    public function destroy($nomorPengajuan)
    {
        $pengajuanProposal = \App\Models\PengajuanProposal::where('nomor_pengajuan', $nomorPengajuan)->first();
        if (!$pengajuanProposal) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $pengajuanProposal->delete();
        return response()->json(['message' => 'Record deleted'], 200);
    }
}
