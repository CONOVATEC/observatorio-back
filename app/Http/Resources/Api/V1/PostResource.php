<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'title'=>Str::title($this->title),
            'imagen'=>$this->imagen(),
            'slug'=>$this->slug,
            'extract'=>$this->extract, //elimina las etiquetas de HTML
            'content'=>$this->content, //elimina las etiquetas de HTML
            'status'=>$this->estado($this->status),
            'news_cover'=>$this->estado($this->news_cover),//portada_noticias
            'tendencia'=>$this->tendencia($this->tendencia_active),
            'category'=>$this->category->name,
            'importantTwo'=>$this->importantTwo,
            'importantThree'=>$this->importantThree,
            'importantFour'=>$this->importantFour,
            'tags'=> TagResource::collection($this->tags),
            'likes'=>LikeResource::collection($this->likes),
            'user'=>[
                'name'=>$this->user->name,
                'email'=>$this->user->email,
                'avatar'=>$this->user->profile_photo_url,
            ],
            'created'=>$this->created_at->format('d-m-Y'),
        ];
    }
     /***********************
    *  Activo/Inactivo     *
    ************************/
    private function estado($valor){
        if($valor==1){
            $estado=false;
        }else if($valor==2){
            $estado=true;
        }
        return $estado;
    }

    private function tendencia($valor){
        if($valor==1){
            $estado=true;
        }else if($valor==2){
            $estado=false;
        }
        return $estado;
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
