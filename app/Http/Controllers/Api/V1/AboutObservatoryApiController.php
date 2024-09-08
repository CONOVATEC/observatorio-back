<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\YouthObservatory;
use App\Http\Resources\Api\V1\YoutObservatoryResource;
use App\Http\Resources\Api\V1\AboutObservatoryResource;

class AboutObservatoryApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    {
        $query = YouthObservatory::included()->filter()->sort();
        if (request('search')) {
            $query->search(request('search'));
        }

        $aboutObservatory = $query->getOrPaginate();
        //        dd(PostResource::collection($aboutObservatory));
        return AboutObservatoryResource::collection($aboutObservatory);
    }
    public function show($id)
    {
        $aboutObservatory = YouthObservatory::included()->findOrFail($id);
        return AboutObservatoryResource::make($aboutObservatory);
    }
}
