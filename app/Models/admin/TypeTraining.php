<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTraining extends Model
{
    use HasFactory;

    protected $table="type_trainings";

    protected $fillable = ['name'];

      /****************************************************
     * Relación de Uno a Muchos hasmany => tiene muchos *
     ****************************************************/
    public function trainings()
    {
        return $this->hasmany(Training::class);
    }
}

