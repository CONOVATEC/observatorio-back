<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\LogoResource;
use App\Models\admin\Logo;
use Illuminate\Http\Request;

class LogoApiController extends Controller
{
    public function index(){
        return LogoResource::collection(Logo::all());
    }
}
