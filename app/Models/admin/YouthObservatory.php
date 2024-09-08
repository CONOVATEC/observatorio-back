<?php

namespace App\Models\admin;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthObservatory extends Model
{
    use HasFactory, ApiTrait;

    protected $table = "youth_observatories";

    protected $fillable = ['mission', 'vision', 'about_us', 'url_organization_chart'];
    /************
     * PARA API *
     ************/

    //* Para ordernar
    protected $allowSort = ['id', 'mission', 'vision', 'about_us', 'url_organization_chart', 'created_at'];
    //* Para búsqueda
    protected $allowSearch = ['mission', 'vision', 'about_us', 'url_organization_chart', 'created_at'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
