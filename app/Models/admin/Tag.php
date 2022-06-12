<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="tags";

    protected $fillable = ['name'];

     /*********************************************************
     * Relación de muchos a muchos => pertenece a muchos *
     * relación muchos a muchos para news
     *********************************************************/
    public function news()
    {
        return $this->belongsToMany(News::class);
    }
}
