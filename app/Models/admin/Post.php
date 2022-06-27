<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    //protected $fillable = ['title','slug','extract','content','tendencia_active','category_id','user_id'];
    protected $guarded=['id','create_at','update_at'];

    /**********************************************************
     * Relación de uno a muchos hasMany => tiene muchos likes *
     **********************************************************/
    //*Método para likes
    public function likes()
    {
        return $this->hasMany(Like::class);
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

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }


}
