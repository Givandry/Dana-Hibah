<?php

namespace App\Http\Controllers;

use App\Models\Regulasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RegulasiController extends Controller
{
    public function index()
    {
        // Retrieve all records from the Regulasi model
        $regulasis = Regulasi::all();
        // Return the retrieved data as a JSON response
        return response()->json($regulasis);
    }

    public function show($id)
    {
        // Retrieve the record from the Regulasi model by ID
        $regulasi = Regulasi::find($id);

        // Check if the record exists
        if (!$regulasi) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        // Return the retrieved data as a JSON response
        return response()->json($regulasi);
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
             'judul' => 'required',
             'file' => 'required',
             'aktif' => 'required',
        ]);

        // Create a new record in the Regulasi model
        $regulasi = Regulasi::create($validatedData);

        // Return the created data as a JSON response
        return response()->json($regulasi, 201);
    }

    public function update(Request $request, $id)
    {
       
    // Validate the incoming request data
    $validatedData = $request->validate([
            'judul' => 'required',
            'file' => 'required',
            'aktif' => 'required',
        ]);
                // Check if the record exists
                if (!$regulasi) {
                    return response()->json(['error' => 'Record not found'], 404);
                }

        // Update the record in the Regulasi model
        $regulasi->update($validatedData);

        // Return the updated data as a JSON response
        return response()->json($regulasi);
    }

    public function destroy($id)
    {
        // Retrieve the record from the Regulasi model by ID
        $regulasi = Regulasi::find($id);

        // Check if the record exists
        if (!$regulasi) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        // Delete the record from the Regulasi model
        $regulasi->delete();

        // Return a success message as a JSON response
        return response()->json(['message' => 'Record deleted']);
    }
}