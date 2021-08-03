<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntranceRequest;
use App\Http\Resources\EntranceResource;
use App\Models\Entrance;

class EntranceController extends Controller
{
    public function index()
    {
        return EntranceResource::collection(Entrance::with('floors')->get());
    }

    public function getById($id)
    {
        return new EntranceResource(Entrance::with('floors')->find($id));
    }

    public function create(EntranceRequest $request)
    {
        Entrance::create($request->validated());
        return $this->createdData();
    }

    public function update(EntranceRequest $request, Entrance $entrance)
    {
        $entrance->update($request->all());
        return $this->updatedData();
    }

    public function destroy(Entrance $entrance)
    {
        $entrance->delete();
        return $this->deletedData();
    }
}
