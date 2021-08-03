<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return RoleResource::collection(Role::get());
    }

    public function create(RoleRequest $request)
    {
        Role ::create($request->validated());
        return $this->createdData();
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        return $this->updatedData();
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return $this->deletedData();
    }
}
