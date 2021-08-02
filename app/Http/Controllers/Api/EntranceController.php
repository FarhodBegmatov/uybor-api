<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entrance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EntranceController extends Controller
{
    public function index()
    {
        return response()->json(Entrance::with('floors')->get(), 200);
    }

    public function getById($id)
    {
        return response()->json(Entrance::with('floors')->find($id), 200);
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
            'name' => 'required|string|max:155',
            'number' => 'required|integer',
        ]);

        $entrance = Entrance::create($data);
        return response()->json($entrance, 201);
    }

    public function update(Request $request, Entrance $entrance)
    {
        if (Gate::denies('updateData')){
            return response([
                'message' => 'You are not allowed to do this!'
            ]);
        }
        $entrance->update($request->all());
        return response()->json($entrance, 200);
    }

    public function destroy(Entrance $entrance)
    {
        if (Gate::denies('deleteData')){
            return response([
                'message' => 'You are not allowed to do this!'
            ]);
        }
        $entrance->delete();
        return response()->json(' ', 204);
    }
}
