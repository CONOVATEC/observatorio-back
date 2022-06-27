<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youth_observatory extends Model
{
    use HasFactory;
    protected $fillable = ['mission','vision','about_us','organization_chart'];
}
