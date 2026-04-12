<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TryOnResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'tryon_id'     => $this->tryon_id,
            'customer_id'  => $this->customer_id,
            'lens_id'      => $this->lens_id,
            'image_url'    => $this->image_url,
            'status'       => $this->status,
            'created_at'   => $this->created_at->toDateTimeString(),

            'customer'     => new CustomerResource($this->whenLoaded('customer')),
            'lens'         => new LensResource($this->whenLoaded('lens')),
        ];
    }
}
