<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HouseController extends Controller
{
    public function index()
    {
        return response()->json(House::with(['entrances'])->get(), 200);
    }

    public function getById($id)
    {
        return response()->json(House::with(['entrances'])->find($id), 200);
    }

    public function create(Request $request)
    {
        if (Gate::denies('createData')){
            return response([
                'message' => 'You are not allowed to do this!'
            ]);
        }
        $data = $request->validate([
            'name' => 'required|string|max:155',
            'address' => 'required|string|max:255',
        ]);

        $house = House::create($data);
        return response()->json($house, 201);
    }

    public function update(Request $request, House $house)
    {
        if (Gate::denies('updateData')){
            return response([
                'message' => 'You are not allowed to do this!'
            ]);
        }
        $house->update($request->all());
        return response()->json($house, 200);
    }

    public function destroy(House $house)
    {
        if (Gate::denies('deleteData')){
            return response([
                'message' => 'You are not allowed to do this!'
            ]);
        }
        $house->delete();
        return response()->json(' ', 204);
    }
}
