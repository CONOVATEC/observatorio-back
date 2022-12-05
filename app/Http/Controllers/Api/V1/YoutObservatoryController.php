<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\YoutObservatoryResource;
use App\Models\admin\YouthObservatory;
use Illuminate\Http\Request;

class YoutObservatoryController extends Controller
{
    public function index(){
        return YoutObservatoryResource::collection(YouthObservatory::all());
    }
}
