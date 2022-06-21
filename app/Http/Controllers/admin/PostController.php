<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PostRequest;
use App\Models\admin\Category;
use App\Models\admin\Post;
use App\Models\admin\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "inicio"], ['name' => "lista de boletines"]
        ];
        return view('/admin/pages/post/index', [
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function create()
    {
        $post=Post::all();
        $tags=Tag::all();
        $categories=Category::pluck('name','id');//creando formato para pasar a la vista (laravelColecty)
       
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "inicio"], ['name' => "lista de boletines"]
        ];
        return view('admin.pages.post.create', compact('breadcrumbs','post','categories','tags'));
    }

   

    public function store(PostRequest $request){
        $post=Post::create($request->all());
        return($request->tags);
       /* if($request->tags){
            $post->tags()->attach($request->tags);
            return redirect()->route('noticias.index')->with('success', 'Noticia registrada correctamente');
        }*/

    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('noticias.index')->with('warning', 'Noticia eliminado correctamente');
    }
}
