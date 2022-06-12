<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = ['title','slug','extract','content','tendencia_active','category_id','like_id','user_id'];


    /************************************************************************
     * Relación de uno a muchos inversa belongsTo pertenece a like *
     ************************************************************************/

    public function like()
    {
        return $this->belongsTo(Like::class);
    }

     /************************************************************************
     * Relación de uno a muchos inversa belongsTo pertenece a category *
     ************************************************************************/

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     /************************************************************************
     * Relación de uno a muchos inversa belongsTo pertenece a user *
     ************************************************************************/

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*********************************************************
     * Relación de muchos a muchos => pertenece a muchos *
     * relación muchos a muchos para tags
     *********************************************************/
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
