<?php

namespace App\Http\Controllers;

use App\Models\RumahIbadah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RumahIbadahController extends Controller
{
    public function index(Request $request)
{
    // Retrieve all records from the RumahIbadah model
    $query = RumahIbadah::query();

    // Apply search filters
    if ($request->has('search')) {
        $search = $request->search;
        $query->where(function ($query) use ($search) {
            $query->where('nama_rumah_ibadah', 'like', "%$search%")
                ->orWhere('kelurahan', 'like', "%$search%")
                ->orWhere('kecamatan', 'like', "%$search%");
        });
    }

    // Apply sorting
    if ($request->has('sort')) {
        $sort = $request->sort;
        $direction = $request->has('direction') && in_array($request->direction, ['asc', 'desc']) ? $request->direction : 'asc';
        $query->orderBy($sort, $direction);
    }

    // Execute the query and retrieve the results with pagination
    $rumahIbadahs = $query->paginate(5);

    // Return the retrieved data as a JSON response
    return response()->json($rumahIbadahs);
}

    public function show($id)
    {
      // Retrieve the record from the RumahIbadah model by ID
      $rumahIbadah = RumahIbadah::find($id);

      // Check if the record exists
      if (!$rumahIbadah) {
          return response()->json(['error' => 'Record not found'], 404);
      }

      // Return the retrieved data as a JSON response
      return response()->json($rumahIbadah);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama_rumah_ibadah' =>'required',
            'alamat' =>'required',
            'kelurahan' =>'required',
            'kecamatan' =>'required',
            'no_hp' =>'required',
            'email' =>'required',
            'jenis_id' =>'required|exists:jenis,id',
        ]);

        // Create a new record in the RumahIbadah model
        $rumahIbadah = RumahIbadah::create($validatedData);

        // Return the created data as a JSON response
        return response()->json($rumahIbadah, 201);
    }

    public function update(Request $request, $id)
    {
        // Retrieve the record from the RumahIbadah model by ID
        $rumahIbadah = RumahIbadah::find($id);

        // Check if the record exists
        if (!$rumahIbadah) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama_rumah_ibadah' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'jenis_id' => 'required|exists:jenis,id',
        ]);

        // Update the record in the RumahIbadah model
        $rumahIbadah->update($validatedData);

        // Return the updated data as a JSON response
        return response()->json($rumahIbadah);
    }

    public function destroy($id)
    {
        // Retrieve the record from the RumahIbadah model by ID
        $rumahIbadah = RumahIbadah::find($id);

        // Check if the record exists
        if (!$rumahIbadah) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        // Delete the record from the RumahIbadah model
        $rumahIbadah->delete();

        // Return a success message as a JSON response
        return response()->json(['message' => 'Record deleted']);
    }
}