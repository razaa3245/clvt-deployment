<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LensResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'lens_id'       => $this->lens_id,
            'name'          => $this->name,
            'brand'         => $this->brand,
            'color'         => $this->color,
            'price'         => $this->price,
            'type'          => $this->type,
            'image_url'     => $this->image_url,
            'shopkeeper_id' => $this->shopkeeper_id,
            'created_at'    => $this->created_at->toDateTimeString(),

            'shopkeeper'    => new ShopkeeperResource($this->whenLoaded('shopkeeper')),
        ];
    }
}
