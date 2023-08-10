<?php

namespace App\Http\Resources\Api\V1;

use App\Http\Resources\Api\V1\CategoryResource;
use App\Http\Resources\Api\V1\TagResource;
use App\Http\Resources\Api\V1\UserResource;
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

        return [
            'id' => $this->id,
            'title' => Str::title($this->title),
            // 'images' => $this->imagen(),
            'imagen' => $this->getFirstImageUrl(),
            'slug' => $this->slug,
            'extract' => $this->extract,
            'content' => $this->content,
            'url_image' => ($this->url_image == '' || is_null($this->url_image)) ? null : $this->url_image,
            'status' => $this->status == 1 ? 'BORRADOR' : 'PUBLICADO',
            'news_cover' => $this->news_cover == 1 ? 'cover' : 'not_cover', //portada_noticias
            'tendencia' => $this->tendencia_active == 1 ? 'trend' : 'not_trend',
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            // 'likes'=>LikeResource::collection($this->likes),
            'user' => UserResource::make($this->whenLoaded('user')),
            'created_at' => $this->created_at->format('d-m-Y'),
        ];
    }
    /***********************
     *  Activo/Inactivo     *
     ************************/
    private function estado($valor)
    {
        if ($valor == 1) {
            $estado = false;
        } else if ($valor == 2) {
            $estado = true;
        }
        return $estado;
    }

    private function tendencia($valor)
    {
        if ($valor == 1) {
            $estado = true;
        } else if ($valor == 2) {
            $estado = false;
        }
        return $estado;
    }

    public function getFirstImageUrl()
    {
        if ($this->images->isEmpty()) {
            return null;
        }

        $firstImage = $this->images->first();

        if (is_null($firstImage) || empty($firstImage->url)) {
            return null;
        }

        return $firstImage->url;
    }

}
