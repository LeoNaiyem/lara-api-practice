<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'order_total' => $this->order_total,
            'paid_total' => $this->paid_total,
            'remark' => $this->remark,
            'customer_id' => $this->customer_id,
        ];
    }
    public function with(Request $request)
    {
        return [
            'status' => 'success',
            'code' => 200
        ];
    }
}
