<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutCmpj extends Model
{
    use HasFactory;

    protected $table="about_cmpj";

    protected $fillable = ['ordinance','about_us','vision','functions','board_of_directors','social'];
}

