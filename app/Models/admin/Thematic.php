<?php

namespace App\Models\admin;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thematic extends Model
{
    use HasFactory, ApiTrait;
    protected $fillable = ['name', 'description', 'url_icono'];
    //Para registrar la actividad del Usuario
    protected $table = "thematics";
    //* Para filtrar
    protected $allowFilter = ['name', 'description', 'url_icono'];
    //* Para ordernar
    protected $allowSort = ['id', 'name', 'description', 'url_icono', 'created_at'];
    //* Para búsqueda
    protected $allowSearch = ['name', 'description'];
}
