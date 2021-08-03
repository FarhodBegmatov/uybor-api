<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FloorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'number' => $this->number,
            'apartments' => $this->apartments
        ];
    }
}
