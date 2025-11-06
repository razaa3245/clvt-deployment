<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnalyticsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'analytics_id'  => $this->analytics_id,
            'shopkeeper_id' => $this->shopkeeper_id,
            'views'         => $this->views,
            'clicks'        => $this->clicks,
            'sales'         => $this->sales,
            'date'          => $this->date,
            'created_at'    => $this->created_at->toDateTimeString(),

            'shopkeeper'    => new ShopkeeperResource($this->whenLoaded('shopkeeper')),
        ];
    }
}
