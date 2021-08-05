<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FloorRequest;
use App\Http\Resources\FloorResource;
use App\Models\Floor;
use Illuminate\Http\Resources\Json\JsonResource;

class FloorController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasAnyRoles(['super-admin', 'manager'])) {
            return FloorResource::collection(Floor::with('apartments')->get());
        }
        $this->messageNotAllowedTo();
    }

    public function getById($id)
    {
        if (auth()->user()->hasAnyRoles(['super-admin', 'manager'])) {
            return new FloorResource(Floor::with('apartments')->find($id));
        }
        $this->messageNotAllowedTo();
    }

    public function create(FloorRequest $request)
    {
        if (auth()->user()->hasRole('super-admin')){
            return $this->createdData([
                'floor' => Floor::create($request->validated())
            ]);
        }
        $this->messageNotAllowedTo();
    }

    public function update(FloorRequest $request, Floor $floor)
    {
        if (auth()->user()->hasRole('super-admin')){
            return $this->updatedData([
                'floor' => $floor->update($request->validated())
            ]);
        }
        $this->messageNotAllowedTo();
    }

    public function destroy(Floor $floor)
    {
        if (auth()->user()->hasRole('super-admin')){
            $floor->delete();
            return $this->deletedData();
        }
        $this->messageNotAllowedTo();

    }
}
