<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $request->id,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'user_id' => $request->user_id,
            'user_id' => $request->user_id,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ];
    }
}
