<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description'];


      /****************************************************
     * Relación de Uno a Muchos hasmany => tiene muchos *
     ****************************************************/
    public function posts(){
        return $this->hasmany(Post::class);
    }
}




