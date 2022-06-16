<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReaderLog extends Model
{
    use HasFactory;
    protected $table="register_readers";

    protected $fillable = ['name','last_name','dates_of_birth','comment'];
}
