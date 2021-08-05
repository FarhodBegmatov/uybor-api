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
        if (auth()->user()->hasAnyRoles(['super-admin', 'manager'])) {
            return EntranceResource::collection(Entrance::with('floors')->get());
        }
        $this->messageNotAllowedTo();
    }

    public function getById($id)
    {
        if (auth()->user()->hasAnyRoles(['super-admin', 'manager'])) {
            return new EntranceResource(Entrance::with('floors')->find($id));
        }
        $this->messageNotAllowedTo();
    }

    public function create(EntranceRequest $request)
    {
        if (auth()->user()->hasRole('super-admin')){
            return $this->createdData([
                'entrance' => Entrance::create($request->validated())
            ]);
        }
        $this->messageNotAllowedTo();
    }

    public function update(EntranceRequest $request, Entrance $entrance)
    {
        if (auth()->user()->hasRole('super-admin')){
            return $this->updatedData([
                'entrance' => $entrance->update($request->all())
            ]);
        }
        $this->messageNotAllowedTo();

    }

    public function destroy(Entrance $entrance)
    {
        if (auth()->user()->hasRole('super-admin')){
            $entrance->delete();
            return $this->deletedData();
        }
        $this->messageNotAllowedTo();

    }
}
