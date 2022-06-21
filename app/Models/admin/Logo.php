<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    protected $table="logos";

    protected $fillable = ['name','image_logo','social_media','type_logo_id'];

     /************************************************************************
     * Relación de uno a muchos inversa belongsTo pertenece a type_logo *
     ************************************************************************/

    public function type_logo()
    {
        return $this->belongsTo(TypeLogo::class);
    }
}
