<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeLogo extends Model
{
    use HasFactory;
    protected $table="type_logo";

    protected $fillable = ['name','description'];

      /****************************************************
     * Relación de Uno a Muchos hasmany => tiene muchos *
     ****************************************************/
    public function logos()
    {
        return $this->hasmany(Logo::class);
    }
}

