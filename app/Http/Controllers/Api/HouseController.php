<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        return response()->json(House::get(), 200);
    }

    public function getById($id)
    {
        return response()->json(House::find($id), 200);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:155',
            'address' => 'required|string|max:255',
        ]);

        $house = House::create($data);
        return response()->json($house, 201);
    }

    public function update(Request $request, House $house)
    {
        $house->update($request->all());
        return response()->json($house, 200);
    }

    public function destroy(House $house)
    {
        $house->delete();
        return response()->json(' ', 204);
    }
}
