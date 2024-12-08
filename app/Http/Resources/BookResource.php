<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'AuthorId' => $this->AuthorId,
            'Title' => $this->Title,
            "AuthorName" => $this->AuthorName,
            "Image" => $this->Image,
            "Description" => $this->Description,
            'Category' => $this->whenLoaded('category')
        ];
    }
}
