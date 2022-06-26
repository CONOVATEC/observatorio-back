<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\TagRequest;
use App\Models\admin\Tag;
use Illuminate\Http\Request;


class TagController extends Controller
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
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de etiquetas"],
        ];
        return view('admin.pages.tag.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::latest()->paginate(5);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "etiquetas", 'name' => "Etiquetas"], ['name' => "Registrando etiqueta"],
        ];
        return view('admin.pages.tag.create', compact('breadcrumbs', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        Tag::create($request->all());
        return redirect()->route('etiquetas.index')->with('success', 'Etiqueta registrado correctamente');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $tags = Tag::latest()->paginate(5);
        $tag = Tag::findOrFail($id);
        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "etiquetas", 'name' => "Etiquetas"], ['name' => "Editando etiqueta"],
        ];
        return view('admin.pages.tag.edit', compact('breadcrumbs', 'tags', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        // dd($id);

        Tag::find($id)->update($request->all());
        // $category->update($request->all());
       return redirect()->route('etiquetas.edit', $id)->with('info', 'Etiqueta actualizado correctamente');
        //return redirect()->route('etiquetas.index');
        //return view('admin.pages.tag.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Tag::findOrFail($id)->delete();
        return redirect()->route('etiquetas.index')->with('warning', 'Etiqueta eliminado correctamente');
    }


    // Método para restaurar el registro eliminado
    public function restore($id)
    {
        $tag = Tag::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Etiqueta restaurado correctamente');
    }
    // Método para restaurareliminar el registro definitivamente
    public function deleteDefinitive($id)
    {
        $taggy = Tag::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('warning', 'Etiqueta eliminado definitivamente');
    }
}
