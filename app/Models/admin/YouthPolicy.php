<?php

namespace App\Models\admin;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthPolicy extends Model
{
    use HasFactory, ApiTrait;

    protected $table = "youth_policies";
    protected $guarded = ['id', 'create_at', 'update_at'];
    /************
     * PARA API *
     ************/

    //* Para ordernar
    protected $allowSort = ['id', 'name', 'description', 'created_at'];
    //* Para búsqueda
    protected $allowSearch = ['name', 'description', 'created_at'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }



}
