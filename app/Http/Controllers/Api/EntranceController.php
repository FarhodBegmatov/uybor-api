<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entrance;
use Illuminate\Http\Request;

class EntranceController extends Controller
{
    public function index()
    {
        return response()->json(Entrance::get(), 200);
    }

    public function getById($id)
    {
        return response()->json(Entrance::find($id), 200);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:155',
            'number' => 'required|integer',
        ]);

        $entrance = Entrance::create($data);
        return response()->json($entrance, 201);
    }

    public function update(Request $request, Entrance $entrance)
    {
        $entrance->update($request->all());
        return response()->json($entrance, 200);
    }

    public function destroy(Entrance $entrance)
    {
        $entrance->delete();
        return response()->json(' ', 204);
    }
}
