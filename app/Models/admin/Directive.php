<?php

namespace App\Models\admin;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directive extends Model
{
    use HasFactory, ApiTrait;

    protected $guarded = ['id', 'create_at', 'update_at'];
    /************
     * Para API *
     ************/
    //* Para consultar las  relaciones
    protected $allowIncluded = ['position', 'image'];
    //* Para filtrar
    protected $allowFilter = ['name', 'status', 'position_id', 'url_image', 'created_at'];
    //* Para ordernar
    protected $allowSort = ['name', 'status', 'position_id', 'url_image', 'created_at'];
    //* Para búsqueda
    protected $allowSearch = ['name', 'status', 'position_id', 'url_image', 'created_at'];

    /************************************************************************
     * Relación de uno a muchos inversa belongsTo pertenece a position *
     ************************************************************************/

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
