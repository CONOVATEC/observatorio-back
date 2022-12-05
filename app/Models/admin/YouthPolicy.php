<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthPolicy extends Model
{
    use HasFactory;

    protected $table="youth_policies";
    protected $guarded=['id','create_at','update_at'];

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }



}
