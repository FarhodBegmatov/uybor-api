<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use App\Http\Resources\HouseResource;
use App\Models\House;
use Illuminate\Http\Resources\Json\JsonResource;

class HouseController extends Controller
{
    public function index()
    {
        return HouseResource::collection(House::with('entrances')->get());
    }

    public function getById($id)
    {
        return new HouseResource(House::with('entrances')->find($id));
    }

    public function create(HouseRequest $request)
    {
        House::create($request->validated());
        return $this->createdData();
    }

    public function update(HouseRequest $request, House $house)
    {
        $house->update($request->validated());
        return $this->updatedData();
    }

    public function destroy(House $house)
    {
        $house->delete();
        return $this->deletedData();
    }
}
