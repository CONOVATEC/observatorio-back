<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PostRequest;
use App\Models\admin\Category;
use App\Models\admin\Post;
use App\Models\admin\Tag;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
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
        //$tags=Tag::all();
        $tags=Tag::pluck('name','id');
        $categories=Category::pluck('name','id');//creando formato para pasar a la vista (laravelColecty)
       
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "inicio"], ['name' => "lista de boletines"]
        ];
        return view('admin.pages.post.create', compact('breadcrumbs','post','categories','tags'));
    }

   

    public function store(PostRequest $request){

       //return Storage::put('news',$request->file('file'));
     // return $request->status;
    //return dd( ($request->all()));
      // $post=Post::create($request->all());
       $post=Post::create([
            'title'=>$request['title'],
            'slug'=>$request['slug'],
            'extract'=>$request['extract'],
            'content'=>html_entity_decode($request['content']),
            'status'=>$request['status'],
            'tendencia_active'=>$request['tendencia_active'],
            'category_id'=>$request['category_id'],
            'importantOne'=>$request['importantOne'],
            'importantTwo'=>$request['importantTwo'],
            'importantThree'=>$request['importantThree'],
            'importantFour'=>$request['importantFour'],
            'user_id'=>$request['user_id']

       ]);
       //html_entity_decode
        if($request->file('file')){
            //$url=Storage::put('news',$request->file('file')->store('public/news'));
           $url=$request->file('file')->store('public/news');
            $post->image()->create([
                'url'=>$url
            ]);
        }/*else{
           // $url=Storage::disk('news');
            $r=$post->image()->create([
                'url'=>'https://cdn.pixabay.com/photo/2019/10/21/12/01/newspapers-4565916_960_720.jpg'
            ]);
            
        }*/
      
      
        
        if($request->tags){
            $post->tags()->attach($request->tags);
           
        }
        return redirect()->route('noticias.index')->with('success', 'Noticia registrada correctamente');

    }

    public function edit(Request $request, $id)
    {
        $tags=Tag::pluck('name','id');
        $categories=Category::pluck('name','id');//creando formato para pasar a la vista (laravelColecty)
        $posts = Post::latest()->paginate(10);
        $post = Post::findOrFail($id);
       
        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "noticias", 'name' => "Noticias"], ['name' => "Editando Noticia"],
        ];
        return view('admin.pages.post.edit', compact('breadcrumbs', 'posts', 'post','tags','categories'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        // dd($id);
        // $post=$request->all();
        // dd($request->file('file'));
        // if($request->file('file')){
        //     $post=Post::findOrFail($id);
        //     Storage::delete('public/news'.$post->file);
        //     $post['file']=$request->file('file')->store('public/news');
        // }else{

        // }
        //Post::find($id)->update($request->all());
       // Post::find($id)->update($request->all());
           
        /*if($request->file('file')){
            $url=$request->file('file')->store('public/news');
            $post=Post::findOrFail($id);
            Storage::delete($post->image->url);
            $post->image()->create([
                'url'=>$url
            ]);
           
        }*/
        $data=[
            'title'=>$request['title'],
            'slug'=>$request['slug'],
            'extract'=>$request['extract'],
            'content'=>html_entity_decode($request['content']),
            'status'=>$request['status'],
            'tendencia_active'=>$request['tendencia_active'],
            'category_id'=>$request['category_id'],
            'importantOne'=>$request['importantOne'],
            'importantTwo'=>$request['importantTwo'],
            'importantThree'=>$request['importantThree'],
            'importantFour'=>$request['importantFour'],
          
        ];
        Post::find($id)->update($data);
        if($request->file('file')){
            $url=Storage::put('public/news',$request->file('file'));
            $post=Post::findOrFail($id);
            if($post->image){
                Storage::delete($post->image->url);
                $post->image->update([
                    'url'=>$url
                ]);

            }else{
                $post->image()->create([
                    'url'=>$url
                ]);
            }
        }
        //Post::find($id)->update($request->all());
         if($request->tags){
           
            Post::find($id)->tags()->sync($request->tags);
           
        }
     
        
        
        return redirect()->route('noticias.index')->with('info', 'Noticia actualizada correctamente');
    }

    public function destroy($id)
    {   
       
        Post::findOrFail($id)->delete();
        return redirect()->route('noticias.index')->with('warning', 'Noticia eliminada temporalmente correctamente');
    }

     // Método para restaurar el registro eliminado
     public function restore($id)
     {
         $post = Post::withTrashed()->find($id)->restore();
         return redirect()->back()->with('success', 'Noticia restaurado correctamente');
     }
     // Método para restaurareliminar el registro definitivamente
     public function deleteDefinitive($id)
     { 
       //$post=Post::withTrashed()->find($id);
       //$url=Storage::put('public/news',$request->file('file'));
        // if(Storage::delete('public/news',$post->file)){
        //     Post::onlyTrashed()->find($id)->forceDelete();
        // }
        //is_null($post->image) && Storage::delete('public/news',$post->file);;
        $post=Post::onlyTrashed()->find($id);
        
       
      
        if(!is_null($post->image)){
            if(Storage::delete($post->image->url)){
                    Post::onlyTrashed()->find($id)->forceDelete();
              }
        }else{
            Post::onlyTrashed()->find($id)->forceDelete();
        }
        //!is_null($post->image) && Storage::delete('public/news',$post->file);
        // if(Storage::delete($post->image->url)){
        //         Post::onlyTrashed()->find($id)->forceDelete();
        //  }else{

        //  }
     
               
         
       
        
       
        
         return redirect()->back()->with('warning', 'Noticia eliminado definitivamente');
     }
}
