<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        return response()->json(Role ::get(), 200);
    }

    public function create(Request $request)
    {
        if (Gate::denies('deleteData')){
            return response([
                'message' => 'You are not allowed to do this!'
            ]);
        }
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'name' => 'required|string|max:155',
            'description' => 'required|string|max:155',
        ]);

        $role = Role ::create($data);
        return response()->json($role, 201);
    }

    public function update(Request $request, Role $role)
    {
        if (Gate::denies('deleteData')){
            return response([
                'message' => 'You are not allowed to do this!'
            ]);
        }
        $role->update($request->all());
        return response()->json($role, 200);
    }

    public function destroy(Role $role)
    {
        if (Gate::denies('deleteData')){
            return response([
                'message' => 'You are not allowed to do this!'
            ]);
        }
        $role->delete();
        return response()->json(' ', 204);
    }
}
