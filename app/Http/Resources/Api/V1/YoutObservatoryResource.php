<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class YoutObservatoryResource extends JsonResource
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
            'mission'=>$this->mission,
            'vision'=>$this->vision,
            'about'=>$this->about_us,
            'url_organigrama'=>$this->url_organization_chart
            //'imagen_observatory'=>$this->imagen()
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
