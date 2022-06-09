<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthStrategy extends Model
{
    use HasFactory;

    protected $table="youth_strategies";

    protected $fillable = ['name','theme','description','axes','imagen_theme','imagen_strategy','user_id'];


    /************************************************************************
     * Relación de uno a muchos inversa belongsTo pertenece a usuarios  *
     ************************************************************************/

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
