<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_cmpj extends Model
{
    use HasFactory;
    protected $table="about_cmpj";

protected $fillable = ['title_cmpj','description_cmpj','title_assembly','description_assembly','title_directive','description_directive','link_video','link_drive'];
}
