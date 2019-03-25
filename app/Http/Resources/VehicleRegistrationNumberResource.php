<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class VehicleRegistrationNumberResource extends Resource
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
            'registration_number' => $this->registration_number,
            'status' => $this->status,
            'area_id' => $this->area_id,
        ];
    }
}
