<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use App\Http\Resources\HouseResource;
use App\Models\House;

class HouseController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasAnyRoles(['super-admin', 'manager'])) {
            return HouseResource::collection(House::with('entrances')->get());
        }
        $this->messageNotAllowedTo();
    }

    public function getById($id)
    {
        if (auth()->user()->hasAnyRoles(['super-admin', 'manager'])) {
            return new HouseResource(House::with('entrances')->find($id));
        }
        $this->messageNotAllowedTo();
    }

    public function create(HouseRequest $request)
    {
        if (auth()->user()->hasRole('super-admin')){
            return $this->createdData([
                'house' => House::create($request->validated())
            ]);
        }
        $this->messageNotAllowedTo();
    }

    public function update(HouseRequest $request, House $house)
    {
        if (auth()->user()->hasRole('super-admin')){
            return $this->updatedData([
                'house' => $house->update($request->validated())
            ]);
        }
        $this->messageNotAllowedTo();
    }

    public function destroy(House $house)
    {
        if (auth()->user()->hasRole('super-admin')){
            $house->delete();
            return $this->deletedData();
        }
        $this->messageNotAllowedTo();

    }
}
