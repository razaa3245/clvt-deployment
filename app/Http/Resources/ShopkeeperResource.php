<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopkeeperResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'shopkeeper_id' => $this->shopkeeper_id,
            'name'          => $this->name,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'shop_name'     => $this->shop_name,
            'address'       => $this->address,
            'status'        => $this->status,
            'created_at'    => $this->created_at->toDateTimeString(),

            // Relationships
            'subscriptions' => SubscriptionResource::collection($this->whenLoaded('subscriptions')),
            'analytics'     => AnalyticsResource::collection($this->whenLoaded('analytics')),
        ];
    }
}
