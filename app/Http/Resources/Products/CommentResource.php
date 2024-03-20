<?php

namespace App\Http\Resources\Products;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'user_id' => $this->user_id,
            'product_id' => $this->product,
            'message' => $this->message,
            'time' => Carbon::parse($this->created_at)->format('d F Y'),
            'user_name'=>$this->user->name,
        ];
    }
}
