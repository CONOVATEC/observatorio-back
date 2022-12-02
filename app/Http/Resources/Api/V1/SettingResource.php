<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'name_entity'=>$this->name_entity,
            'link_facebook'=>$this->link_facebook,
            'link_instagram'=>$this->link_instagram,
            'link_linkedin'=>$this->link_linkedin,
            'link_youtube'=>$this->link_youtube,
            'url_image'=>$this->url_image,
            'link_linkedin'=>$this->link_linkedin,
            'created'=>$this->created_at->format('d-m-Y')
            ];
    }
}
