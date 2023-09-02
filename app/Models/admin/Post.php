<?php

namespace App\Models\admin;

use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, ApiTrait, SoftDeletes;
    const BORRADOR = 1;
    const PUBLICADO = 2;

    //* Para consultar las  relaciones
    protected $allowIncluded = ['user', 'category', 'tags', 'images'];
    //* Para filtrar
    protected $allowFilter = ['id', 'title', 'slug', 'extract', 'content'];
    //* Para ordernar
    protected $allowSort = ['id', 'title', 'slug', 'extract', 'content', 'status', 'user_id','created_at'];
    //* Para búsqueda
    protected $allowSearch = ['title', 'slug', 'extract', 'content', 'status'];

    protected $fillable = ['title', 'slug', 'extract', 'content', 'tendencia_active', 'status', 'url_image', 'category_id', 'user_id'];
    // protected $guarded=['id','created_at','update_at'];

    public function scopeActigitve($query)
    {
        return $query->where('status', Post::PUBLICADO);
    }

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

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
