<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class YouthPolicy extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table="youth_policies";

    protected $fillable = ['name','descripcion'];
}
