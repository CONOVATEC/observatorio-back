<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\admin\Directive;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\DirectiveResource;

class DirectiveApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    {
        $query = Directive::included()->filter()->sort();
        if (request('search')) {
            $query->search(request('search'));
        }

        $directive = $query->getOrPaginate();
        //        dd(PostResource::collection($directive));
        return DirectiveResource::collection($directive);
    }
    public function show($id)
    {
        $directive = Directive::included()->findOrFail($id);
        return DirectiveResource::make($directive);
    }
}
