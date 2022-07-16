<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;

    protected $guarded=['id','create_at','update_at'];

     /************************************************************************
     * Relación de uno a muchos inversa belongsTo pertenece a type_logo *
     ************************************************************************/

    public function type_logo()
    {
        return $this->belongsTo(TypeLogo::class);
    }

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
