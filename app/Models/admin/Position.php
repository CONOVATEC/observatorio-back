<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','slug'];


    /****************************************************
     * Relación de Uno a Muchos hasmany => tiene muchos *
     ****************************************************/
    public function directives()
    {
        return $this->hasmany(Directive::class);
    }

}
