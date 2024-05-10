<?php

namespace App\Http\Resources\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class bookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'author' => $this->author,
            'main categoy' => new mainCategoryResource($this->mainCategory),
            'sub categoy' => new subCategoryResource($this->subCategory),
        ];
    }
}
