<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SoldHouseResource extends JsonResource
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
            'client_id' => $this->client_id,
            'apartment_id' => $this->apartment_id,
            'summa' => $this->summa,
        ];
    }
}
