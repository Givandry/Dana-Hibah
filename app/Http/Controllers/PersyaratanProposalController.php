<?php

namespace App\Http\Controllers;

use App\Models\PersyaratanProposal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersyaratanProposalController extends Controller
{
     public function index()
     {
         $query = PersyaratanProposal::query();
         $persyaratanProposals = $query->paginate(5);
         return response()->json($persyaratanProposals);
     }

     public function show($id)
      {
         $persyaratanProposal = PersyaratanProposal::find($id);
         if (!$persyaratanProposal) {
            return response()->json(['error' => 'Record not found'], 404);
         }
         return response()->json($persyaratanProposal);
      }

     public function store(Request $request)
     {
        $validatedData = $request->validate([
             'persyaratan' =>'required',
             'active' =>'required',
        ]);

        $persyaratanProposal = PersyaratanProposal::create($validatedData);
        return response()->json($persyaratanProposal, 201);
     }
     
     public function update(Request $request, $id)
     {
        $persyaratanProposal = PersyaratanProposal::find($id);

        if (!$persyaratanProposal) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
             'persyaratan' =>'required',
             'active' =>'required'
        ]);

        $persyaratanProposal->update($validatedData);

        return response()->json($persyaratanProposal);
     }

     public function destroy($id)
     {
        $persyaratanProposal = PersyaratanProposal::find($id);

        if (!$persyaratanProposal) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $persyaratanProposal->delete();

        return response()->json(['message' => 'Record deleted successfully'], 200);
     }
}