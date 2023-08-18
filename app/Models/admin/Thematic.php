<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thematic extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'description', 'url_icono'];
    protected $fillable = ['name', 'description', 'url_icono'];
    //Para registrar la actividad del Usuario
    protected $table = "thematics";
}
