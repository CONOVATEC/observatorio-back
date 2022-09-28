<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\YouthPolicyResource;
use App\Models\admin\YouthPolicy;
use Illuminate\Http\Request;

class YouthPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return LogoResource::collection(Logo::all());
       return  YouthPolicyResource::collection(YouthPolicy::all());

    }


}
