<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\AboutCmpjResource;
use App\Models\admin\About_cmpj;
use Illuminate\Http\Request;

class AboutCmpjController extends Controller
{
    public function index(){
        return AboutCmpjResource::collection(About_cmpj::all());
    }
}
