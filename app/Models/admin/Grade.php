<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{

    use HasFactory;
    protected $fillable = ['title','content','url_image'];
}
