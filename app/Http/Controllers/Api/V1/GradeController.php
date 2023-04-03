<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Resources\Api\V1\GradeResource;
use App\Models\admin\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GradeResource::collection(Grade::all());
    }
}
