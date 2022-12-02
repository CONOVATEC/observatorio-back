<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthStrategy extends Model
{
    use HasFactory;

    protected $table="youth_strategies";
    protected $guarded=['id','create_at','update_at'];

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }


}
