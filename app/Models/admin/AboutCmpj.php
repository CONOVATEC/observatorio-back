<?php

namespace App\Models\admin;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutCmpj extends Model
{
    use HasFactory, ApiTrait;

    protected $table = "about_cmpj";

    protected $fillable = ['ordinance', 'about_us', 'vision', 'functions', 'board_of_directors', 'social'];
    /************
     * PARA API *
     ************/

    //* Para ordernar
    protected $allowSort = ['id', 'ordinance', 'about_us', 'vision', 'functions', 'board_of_directors', 'social', 'created_at'];
    //* Para búsqueda
    protected $allowSearch = ['ordinance', 'about_us', 'vision', 'functions', 'board_of_directors', 'social', 'created_at'];
}

