<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;



    protected $fillable = ['reaction'];


      /****************************************************
     * Relación de Uno a Muchos hasmany => tiene muchos *
     ****************************************************/
    public function posts()
    {
        return $this->hasmany(Post::class);
    }
}



