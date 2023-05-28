<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\admin\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\PostResource;

class PostApiController extends Controller
{
    public function index()
    {
        //$post=PostResource::collection(Post::where('status',2)->get());


       return PostResource::collection(Post::paginate(5));

    }
}
