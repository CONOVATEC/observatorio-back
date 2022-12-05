<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\DirectiveResource;
use App\Models\admin\Directive;
use Illuminate\Http\Request;

class DirectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DirectiveResource::collection(Directive::all());
    }


}
