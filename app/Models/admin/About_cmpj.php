<?php

namespace App\Models\admin;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_cmpj extends Model
{
    use HasFactory, ApiTrait;
    protected $table = "about_cmpj";

    protected $fillable = ['title_cmpj', 'description_cmpj', 'title_assembly', 'description_assembly', 'title_directive', 'description_directive', 'link_video', 'link_drive'];
    /************
     * PARA API *
     ************/

    //* Para ordernar
    protected $allowSort = ['id', 'title_cmpj', 'description_cmpj', 'title_assembly', 'description_assembly', 'title_directive', 'description_directive', 'created_at'];
    //* Para búsqueda
    protected $allowSearch = ['title_cmpj', 'description_cmpj', 'title_assembly', 'description_assembly', 'title_directive', 'description_directive', 'created_at'];
}
