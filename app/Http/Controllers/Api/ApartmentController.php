<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApartmentRequest;
use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use Illuminate\Http\Resources\Json\JsonResource;

class ApartmentController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasAnyRoles(['super-admin', 'manager'])) {
            return ApartmentResource::collection(Apartment::get());
        }
        $this->messageNotAllowedTo();
    }

    public function getById($id)
    {
        if (auth()->user()->hasAnyRoles(['super-admin', 'manager'])) {
            return new ApartmentResource(Apartment::find($id));
        }
        $this->messageNotAllowedTo();
    }

    public function create(ApartmentRequest $request)
    {
        if (auth()->user()->hasRole('super-admin')){
            return $this->createdData([
                'apartment'=> Apartment::create($request->validated())
            ]);
        }
        $this->messageNotAllowedTo();
    }

    public function update(ApartmentRequest $request, Apartment $apartment)
    {
        if (auth()->user()->hasRole('super-admin')){
            return $this->updatedData([
                'apartment'=> $apartment->update($request->validated())
            ]);
        }
        $this->messageNotAllowedTo();
    }

    public function destroy(Apartment $apartment)
    {
        if (auth()->user()->hasRole('super-admin')){
            $apartment->delete();
            return $this->deletedData();
        }
        $this->messageNotAllowedTo();
    }
}
