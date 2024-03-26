<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Post */
class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => $this->whenLoaded('user', fn () => UserResource::make($this->user)),
            'title' => $this->title,
            'body' => $this->body,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
