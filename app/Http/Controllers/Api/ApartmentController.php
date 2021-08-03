<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApartmentRequest;
use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;

class ApartmentController extends Controller
{
    public function index()
    {
        return ApartmentResource::collection(Apartment::get());
    }

    public function getById($id)
    {
        return new ApartmentResource(Apartment::find($id));
    }

    public function create(ApartmentRequest $request)
    {
        Apartment::create($request->validated());
        return $this->createdData();
    }

    public function update(ApartmentRequest $request, Apartment $apartment)
    {
        $apartment->update($request->validated());
        return $this->updatedData();
    }

    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return $this->deletedData();
    }
}
