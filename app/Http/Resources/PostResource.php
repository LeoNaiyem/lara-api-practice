<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            'created_at' => $this->created_at->toDatetimeString(),
            'updated_at' => $this->updated_at->toDatetimeString(),
        ];
    }

    public function with($request)
    {
        return [
            'status' => 'success',
            'code' => 200,
        ];
    }
}
