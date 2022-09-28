<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\YouthStrategyResource;
use App\Models\admin\YouthStrategy;
use Illuminate\Http\Request;

class YouthStrategyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  YouthStrategyResource::collection(YouthStrategy::all());
    }


}
