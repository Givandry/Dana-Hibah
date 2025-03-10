<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class JenisController extends Controller
{
    public function index(Request $request)
    {
         // Retrieve all records from the Jenis model
         $jenises = Jenis::get();
         // Return the retrieved data as a JSON response
         return response()->json($jenises);
    }

    public function show($id){
        // Retrieve the record from the Jenis model by ID
        $jenis = Jenis::find($id);

        // Check if the record exists
        if (!$jenis) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        // Return the retrieved data as a JSON response
        return response()->json($jenis);
     }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
             'jenis_rumah_ibadah' =>'required',
        ]);

        // Create a new record in the Jenis model
        $jenis = Jenis::create($validatedData);

        // Return the created data as a JSON response
        return response()->json($jenis, 201);
    }

    public function update(Request $request, $id)
    {
        // Retrieve the record from the Jenis model by ID
        $jenis = Jenis::find($id);

        // Check if the record exists
        if (!$jenis) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        // Validate the incoming request data
        $validatedData = $request->validate([
            'jenis_rumah_ibadah' => 'required',
        ]);

        // Update the record in the Jenis model
        $jenis->update($validatedData);

        // Return the updated data as a JSON response
        return response()->json($jenis);
    }

    public function destroy($id)
    {
        // Retrieve the record from the Jenis model by ID
        $jenis = Jenis::find($id);

        // Check if the record exists
        if (!$jenis) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        // Delete the record from the Jenis model
        $jenis->delete();

        // Return a success message as a JSON response
        return response()->json(['message' => 'Record deleted']);
    }
}