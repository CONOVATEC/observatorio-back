<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thematic extends Model
{
    use HasFactory;

    protected $guarded=['id','create_at','update_at'];
}
