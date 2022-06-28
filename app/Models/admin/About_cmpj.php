<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_cmpj extends Model
{
    use HasFactory;

    protected $fillable = ['ordinance','about_us','vision','functions','board_of_directors','social'];
}
