<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutCmpjResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title_cmpj,
            'description' => $this->description_cmpj,
            'title_assembly' => $this->title_assembly,
            'description_assembly' => $this->description_assembly,
            'title_directive' => $this->title_directive,
            'description_directive' => $this->description_directive,
            'link_video' => $this->link_video,
            'link_drive' => $this->link_drive,
            'created_at' => $this->created_at,
        ];
    }
}
