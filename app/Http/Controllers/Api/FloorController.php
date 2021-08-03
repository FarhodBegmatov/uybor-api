<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FloorRequest;
use App\Http\Resources\FloorResource;
use App\Models\Floor;

class FloorController extends Controller
{
    public function index()
    {
        return FloorResource::collection(Floor::with('apartments')->get());
    }

    public function getById($id)
    {
        return new FloorResource(Floor::with('apartments')->find($id));
    }

    public function create(FloorRequest $request)
    {
        Floor::create($request->validated());
        return $this->createdData();
    }

    public function update(FloorRequest $request, Floor $floor)
    {
        $floor->update($request->validated());
        return $this->updatedData();
    }

    public function destroy(Floor $floor)
    {
        $floor->delete();
        return $this->deletedData();
    }
}
