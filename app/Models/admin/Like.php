<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    /************************************************************************
     * Relación de uno a muchos inversa belongsTo pertenece a post
     ************************************************************************/
    //*Método para post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    //*Método para user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



