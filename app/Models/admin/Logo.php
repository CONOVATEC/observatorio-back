<?php

namespace App\Models\admin;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory, ApiTrait;


    //* Para consultar las  relaciones
    protected $allowIncluded = ['type_logo', 'image'];
    //* Para filtrar
    protected $allowFilter = ['id', 'name', 'social_media', 'url_image'];
    //* Para ordernar
    protected $allowSort = ['id', 'name', 'social_media', 'url_image', 'created_at'];
    //* Para búsqueda
    protected $allowSearch = ['name', 'social_media', 'url_image'];

    protected $guarded = ['id', 'create_at', 'update_at'];

    /************************************************************************
     * Relación de uno a muchos inversa belongsTo pertenece a type_logo *
     ************************************************************************/

    public function type_logo()
    {
        return $this->belongsTo(TypeLogo::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
