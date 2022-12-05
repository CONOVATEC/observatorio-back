<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\admin\Tag;
use App\Models\admin\Post;
use App\Models\admin\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:dashboard')->only('dashboard');
    }
    // home
    public function dashboard()
    {
        $usersCount = User::where('status', 2)->count();
        $users = User::where('status', 2)->latest()->take(2)->get();
        $postsCount = Post::where('status', 2)->count();
        $posts = Post::latest('status', 2)->paginate(5);
        $categoriesCount = Category::count();
        $categories = Category::latest()->paginate(5);
        $tagsCount = Tag::count();
        $tags = Tag::latest()->paginate(5);
        // $tagsTop  = // get Tag data and join with post_tag
        //     $counts = Tag::join('post_tag', 'tags.id', '=', 'post_tag.tag_id')
        //     ->groupBy('tags.id')
        //     ->select(['tags.*', DB::raw('COUNT(*) as cnt')])
        //     ->orderBy('cnt', 'desc')
        //     ->paginate(5);
        $categoriesTop = Category::withCount('posts')->get()->sortByDesc('posts_count')->take(5);
        $tagsTop  = Tag::withCount('posts')->get()->sortByDesc('posts_count')->take(5);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['name' => "Principal"],
        ];
        return view('admin.pages.dashboard.index', compact('breadcrumbs', 'users', 'posts', 'categories', 'tags', 'postsCount', 'usersCount', 'tagsCount', 'categoriesCount', 'tagsTop', 'categoriesTop'));
    }
}
