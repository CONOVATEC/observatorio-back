<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;



class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;




    protected $fillable = ['name','slug'];




    protected $table="tags";



     /*********************************************************
     * Relación de muchos a muchos => pertenece a muchos *
     * relación muchos a muchos para news
     *********************************************************/
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

}
