<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SoldHouseRequest;
use App\Http\Resources\SoldHouseResource;
use App\Models\Apartment;
use App\Models\SoldHouse;
use Illuminate\Http\Request;

class SoldHouseController extends Controller
{
    public function index()
    {
        return SoldHouseResource::collection(SoldHouse::get());
    }

    public function getById($id)
    {
        return new SoldHouseResource(SoldHouse::find($id));
    }

    public function create(SoldHouseRequest $request)
    {
        $data = $request->validated();
        $square = Apartment::query()
            ->where('id', '=', $data['apartment_id'])
            ->value('square');
        $price = Apartment::query()
            ->where('id', '=', $data['apartment_id'])
            ->value('price');

        $data['summa'] = $square * $price;

        SoldHouse ::create($data);
        return $this->createdData();
    }

    public function update(SoldHouseRequest $request, SoldHouse $soldHouse)
    {
        $soldHouse->update($request->all());
        return $this->updatedData();
    }

    public function destroy(SoldHouse $soldHouse)
    {
        $soldHouse->delete();
        return $this->deletedData();
    }
}
