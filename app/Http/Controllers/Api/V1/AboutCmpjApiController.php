<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\admin\AboutCmpj;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\AboutCmpjResource;

class AboutCmpjApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    {
        $query = AboutCmpj::included()->filter()->sort();
        if (request('search')) {
            $query->search(request('search'));
        }

        $aboutCmpj = $query->getOrPaginate();
        //        dd(PostResource::collection($aboutCmpj));
        return AboutCmpjResource::collection($aboutCmpj);
    }
    public function show($id)
    {
        $aboutCmpj = AboutCmpj::included()->findOrFail($id);
        return AboutCmpjResource::make($aboutCmpj);
    }
}
