<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'customer_id'   => $this->customer_id,
            'name'          => $this->name,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'gender'        => $this->gender,
            'dob'           => $this->dob,
            'created_at'    => $this->created_at->toDateTimeString(),

            'try_ons'       => TryOnResource::collection($this->whenLoaded('tryOns')),
        ];
    }
}
