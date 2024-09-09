<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\admin\Logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\LogoResource;

class LogosApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    {
        $query = Logo::included()->filter()->sort();
        if (request('search')) {
            $query->search(request('search'));
        }

        $directive = $query->getOrPaginate();
        //        dd(PostResource::collection($directive));
        return LogoResource::collection($directive);
    }
    public function show($id)
    {
        $directive = Logo::included()->findOrFail($id);
        return LogoResource::make($directive);
    }
}
