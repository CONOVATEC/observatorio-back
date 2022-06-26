<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthObservatory extends Model
{
    use HasFactory;

    protected $table="youth_observatories";

    protected $fillable = ['mission','vision','about_us','organization_chart'];
}
