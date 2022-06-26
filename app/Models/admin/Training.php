<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;


    protected $table="training";

    protected $fillable = ['name','description','type_training_id'];



    /************************************************************************
     * Relación de uno a muchos inversa belongsTo pertenece a training *
     ************************************************************************/

    public function type_training()
    {
        return $this->belongsTo(TypeTraining::class);
    }
}
