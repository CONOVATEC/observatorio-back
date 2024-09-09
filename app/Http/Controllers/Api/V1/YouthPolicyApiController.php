<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\admin\YouthPolicy;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\YouthPolicyResource;

class YouthPolicyApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    {
        $query = YouthPolicy::included()->filter()->sort();
        if (request('search')) {
            $query->search(request('search'));
        }

        $thematics = $query->getOrPaginate();
        //        dd(PostResource::collection($thematics));
        return YouthPolicyResource::collection($thematics);
    }
    public function show($id)
    {
        $thematics = YouthPolicy::included()->findOrFail($id);
        return YouthPolicyResource::make($thematics);

    }
}
