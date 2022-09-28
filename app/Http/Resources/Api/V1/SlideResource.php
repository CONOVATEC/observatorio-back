<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class SlideResource extends JsonResource
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
            'year'=>$this->year,
            'title'=>$this->title,
            'extract'=>$this->extract,
            'status'=>$this->estado($this->status),
            'imagen_slide'=>$this->imagen(),
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

    private function estado($valor){
        if($valor==1){
            $estado=false;
        }else if($valor==2){
            $estado=true;
        }
        return $estado;
    }
}
