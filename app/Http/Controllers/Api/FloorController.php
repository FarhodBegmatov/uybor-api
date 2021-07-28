<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index()
    {
        return response()->json(Floor::get(), 200);
    }

    public function getById($id)
    {
        return response()->json(Floor::find($id), 200);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:155',
            'number' => 'required|integer',
        ]);

        $floor = Floor::create($data);
        return response()->json($floor, 201);
    }

    public function update(Request $request, Floor $floor)
    {
        $floor->update($request->all());
        return response()->json($floor, 200);
    }

    public function destroy(Floor $floor)
    {
        $floor->delete();
        return response()->json(' ', 204);
    }
}
