<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QrCodeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'qrcode_id'     => $this->qrcode_id,
            'shopkeeper_id' => $this->shopkeeper_id,
            'lens_id'       => $this->lens_id,
            'qr_image'      => $this->qr_image,
            'created_at'    => $this->created_at->toDateTimeString(),

            'shopkeeper'    => new ShopkeeperResource($this->whenLoaded('shopkeeper')),
            'lens'          => new LensResource($this->whenLoaded('lens')),
        ];
    }
}
