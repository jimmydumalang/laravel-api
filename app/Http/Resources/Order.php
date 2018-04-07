<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

class order extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'reference' => $this->reference,
            'type' => $this->type,
            'origin_name' => $this->origin_name,
            'origin_address' => $this->origin_address,
            'destination' => $this->destination,
            'contact' => $this->contact,
            'user' => new UserResource($this->user)
        ];
    }
}
