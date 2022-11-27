<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class DirectiveResource extends JsonResource
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
            'position'=>$this->position->name,
            'url_image'=>$this->url_image,
            'status'=>$this->estado($this->status),
            'created'=>$this->created_at->format('d-m-Y'),
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
