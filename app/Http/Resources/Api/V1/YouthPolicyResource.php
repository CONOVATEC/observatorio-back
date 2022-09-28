<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class YouthPolicyResource extends JsonResource
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
            'description'=>$this->description,
            'link_video'=>$this->link_video,
            'link_drive'=>$this->link_drive,
            'imagen_policy'=>$this->imagen(),

        ];
    }

    public function imagen(){
        if(isset($this->image->url)){
            $respuesta=$this->image->url;
        }else{
            $respuesta=null;
        }
        return $respuesta;
        //dd($this->image->url);
    }
}



