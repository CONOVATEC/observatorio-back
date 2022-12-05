<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directive extends Model
{
    use HasFactory;

    protected $guarded=['id','create_at','update_at'];

    /************************************************************************
     * Relación de uno a muchos inversa belongsTo pertenece a position *
     ************************************************************************/

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
