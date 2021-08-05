<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SoldHouseRequest;
use App\Http\Resources\SoldHouseResource;
use App\Models\Apartment;
use App\Models\SoldHouse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SoldHouseController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasAnyRoles(['super-admin', 'accountant', 'manager'])) {
            return SoldHouseResource::collection(SoldHouse::get());
        }
        $this->messageNotAllowedTo();
    }

    public function getById($id)
    {
        if (auth()->user()->hasAnyRoles(['super-admin', 'accountant', 'manager'])) {
            return new SoldHouseResource(SoldHouse::find($id));
        }
        $this->messageNotAllowedTo();
    }

    public function create(SoldHouseRequest $request)
    {
        if (auth()->user()->hasRole('super-admin')){
            $data = $request->validated();
            $square = Apartment::query()
                ->where('id', '=', $data['apartment_id'])
                ->value('square');
            $price = Apartment::query()
                ->where('id', '=', $data['apartment_id'])
                ->value('price');

            $data['summa'] = $square * $price;

            return $this->createdData([
                'soldHouse' => SoldHouse ::create($data)
            ]);
        }
        $this->messageNotAllowedTo();
    }

    public function update(SoldHouseRequest $request, SoldHouse $soldHouse)
    {
        if (auth()->user()->hasRole('super-admin')){
            return $this->updatedData([
                'soldHouse' => $soldHouse->update($request->validated())
            ]);
        }
        $this->messageNotAllowedTo();
    }

    public function destroy(SoldHouse $soldHouse)
    {
        if (auth()->user()->hasRole('super-admin')){
            $soldHouse->delete();
            return $this->deletedData();
        }
        $this->messageNotAllowedTo();
    }
}
