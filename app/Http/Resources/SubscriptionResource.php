<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'subscription_id' => $this->subscription_id,
            'shopkeeper_id'   => $this->shopkeeper_id,
            'plan_name'       => $this->plan_name,
            'price'           => $this->price,
            'start_date'      => $this->start_date,
            'end_date'        => $this->end_date,
            'status'          => $this->status,
            'created_at'      => $this->created_at->toDateTimeString(),

            'shopkeeper'      => new ShopkeeperResource($this->whenLoaded('shopkeeper')),
        ];
    }
}
