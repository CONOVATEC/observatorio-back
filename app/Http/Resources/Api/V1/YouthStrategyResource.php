<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class YouthStrategyResource extends JsonResource
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
            'link_youtube'=>$this->link_youtube,
            'link_drive'=>$this->link_drive,
            'imagen_strategy'=>$this->imagen(),
        ];
    }

    public function imagen(){
        if(isset($this->image->url)){
            $respuesta=$this->image->url;
        }else{
            $respuesta=null;
        }
        return $respuesta;

    }
}
