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
        if (auth()->user()->hasRole('super-admin')){
            return RoleResource::collection(Role::get());
        }
        $this->messageNotAllowedTo();
    }

    public function create(RoleRequest $request)
    {
        if (auth()->user()->hasRole('super-admin')){
            return $this->createdData([
                'role' => Role ::create($request->validated())
            ]);
        }
        $this->messageNotAllowedTo();
    }

    public function update(RoleRequest $request, Role $role)
    {
        if (auth()->user()->hasRole('super-admin')){
            return $this->updatedData([
                'role' => $role->update($request->validated())
            ]);
        }
        $this->messageNotAllowedTo();
    }

    public function destroy(Role $role)
    {
        if (auth()->user()->hasRole('super-admin')){
            $role->delete();
            return $this->deletedData();
        }
        $this->messageNotAllowedTo();
    }
}
