<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FloorController extends Controller
{
    public function index()
    {
        return response()->json(Floor::with('apartments')->get(), 200);
    }

    public function getById($id)
    {
        return response()->json(Floor::with('apartments')->find($id), 200);
    }

    public function create(Request $request)
    {
        if (Gate::denies('createData')){
            return response([
                'message' => 'You are not allowed to do this!'
            ]);
        }
        $data = $request->validate([
            'house_id' => 'required|integer|exists:houses,id',
            'entrance_id' => 'required|integer|exists:entrances,id',
            'name' => 'required|string|max:155',
            'number' => 'required|integer',
        ]);

        $floor = Floor::create($data);
        return response()->json($floor, 201);
    }

    public function update(Request $request, Floor $floor)
    {
        if (Gate::denies('updateData')){
            return response([
                'message' => 'You are not allowed to do this!'
            ]);
        }
        $floor->update($request->all());
        return response()->json($floor, 200);
    }

    public function destroy(Floor $floor)
    {
        if (Gate::denies('deleteData')){
            return response([
                'message' => 'You are not allowed to do this!'
            ]);
        }
        $floor->delete();
        return response()->json(' ', 204);
    }
}
