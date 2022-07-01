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
            'ordinace'=>$this->ordinance,
            'about_us'=>$this->about_us,
            'vision'=>$this->vision,
            'functions'=>$this->functions,
            'board_of_directors'=>$this->board_of_directors,
            'social'=>$this->social,
        ];
    }
}
