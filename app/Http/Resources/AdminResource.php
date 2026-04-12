<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'admin_id' => $this->admin_id,
            'name'     => $this->name,
            'email'    => $this->email,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
