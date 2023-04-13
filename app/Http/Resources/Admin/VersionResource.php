<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VersionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'date'=>$this->date,
            'feature'=>$this->feature,
            'link'=>$this->link,
            'size'=>$this->size,
            'main_image'=>$this->main_image,
        ];
    }
}
