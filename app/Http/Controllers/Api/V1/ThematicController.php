<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\ThematicResource;
use App\Models\admin\Thematic;
use Illuminate\Http\Request;

class ThematicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  ThematicResource::collection(Thematic::all());
    }



}
