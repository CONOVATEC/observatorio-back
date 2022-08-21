<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class LogoResource extends JsonResource
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
            'name'=>$this->name,
            'social_media'=>$this->social_media,
            'type_logo'=>[
                'name'=>$this->type_logo->name,
                'description'=>$this->type_logo->description,
            ]
            //TagResource::collection($this->tags)
        ];
    }
}
