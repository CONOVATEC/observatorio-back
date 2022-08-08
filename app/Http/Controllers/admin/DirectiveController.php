<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\DirectiveRequest;
use App\Models\admin\Image;
use App\Models\admin\Directive;
use App\Models\admin\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de Directivos"],
        ];
        return view('admin.pages.directive.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $directive = Directive::all();
        //dd($directive);
        $position_id = Position::pluck('slug', 'id');
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "directives", 'name' => "Directivo"], ['name' => "Registrando Directivo"],
        ];
        return view('admin.pages.directive.create', compact('breadcrumbs', 'directive','position_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $directive = Directive::create($request->all());
        
        if ($request->file('image_logo')) {
            //$url=Storage::put('news',$request->file('file')->store('public/news'));
            $url = $request->file('image_logo')->store('public/logos');
            $directive->image()->create([
                'url' => $url
            ]);
        }
        return redirect()->route('directives.index')->with('success', 'Directivo registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position_id = Position::pluck('name', 'id');
        $directives = Directive::latest()->paginate(10);
        $directive = Directive::findOrFail($id);

        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "Directivos", 'name' => "Directivos"], ['name' => "Editando Directivo"],
        ];
        return view('admin.pages.directive.edit', compact('breadcrumbs', 'directives', 'directive','position_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DirectiveRequest $request, $id)
    {
        Directive::find($id)->update($request->all());
        if($request->file('image_logo')){
            $url=Storage::put('public/logos',$request->file('image_logo'));
            $directive=Directive::findOrFail($id);
            if($directive->image){
                Storage::delete($directive->image->url);
                $directive->image->update([
                    'url'=>$url
                ]);

            }else{
                $directive->image()->create([
                    'url'=>$url
                ]);
            }
        }

        return redirect()->route('directives.edit', $id)->with('info','El Directivo se actualizo correctamente');
    }

    public function destroy($id)
    {
        $directive = Directive::findOrFail($id);

        if ($directive->image->url) {
            Storage::disk()->delete($directive->image->url);
            $directive->Delete();
        } else {
            $directive->Delete();
        }
        return redirect()->route('directives.index')->with('warning', 'Directivo eliminado correctamente');
    }
}
