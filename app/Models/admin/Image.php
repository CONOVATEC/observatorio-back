<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;



 /*********************************************************
     * Relación polimórfica => pertenece a muchos *
     * relación polimórfica  | el nombre tiene que se igual al campo imageable_id
     *********************************************************/
    public function imageable()
    {
        return $this->morphTo();
    }
}
