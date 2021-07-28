<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index()
    {
        return response()->json(Apartment::get(), 200);
    }

    public function getById($id)
    {
        return response()->json(Apartment::find($id), 200);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'house_id' => 'required|integer|exists:houses,id',
            'entrance_id' => 'required|integer|exists:entrances,id',
            'floor_id' => 'required|integer|exists:floors,id',
            'name' => 'required|string|max:155',
            'number' => 'required|integer',
            'square' => 'required|numeric',
            'price' => 'required|integer',
            'status' => 'nullable|integer',
        ]);

        $apartment = Apartment::create($data);
        return response()->json($apartment, 201);
    }

    public function update(Request $request, Apartment $apartment)
    {
        $apartment->update($request->all());
        return response()->json($apartment, 200);
    }

    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return response()->json(' ', 204);
    }
}
