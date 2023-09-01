<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\ThematicResource;
use App\Models\admin\Thematic;

class ThematicApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    {
        $query = Thematic::included()->filter()->sort();
        if (request('search')) {
            $query->search(request('search'));
        }

        $thematics = $query->getOrPaginate();
//        dd(PostResource::collection($thematics));
        return ThematicResource::collection($thematics);
    }
    public function show($id)
    {
        $thematics = Thematic::included()->findOrFail($id);
        return ThematicResource::make($thematics);

    }
}
