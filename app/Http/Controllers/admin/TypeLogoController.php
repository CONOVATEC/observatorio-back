<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\TypeLogoRequest;
use App\Models\admin\TypeLogo;
use Illuminate\Http\Request;

class TypeLogoController extends Controller
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
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de tipo de logo"],
        ];
        return view('admin.pages.typeLogo.index', compact('breadcrumbs'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typelogo = TypeLogo::latest()->paginate(5);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "tipo de logo", 'name' => "tipo de logos"], ['name' => "Registrando tipo de logo"],
        ];
        return view('admin.pages.typeLogo.create', compact('breadcrumbs', 'typelogo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeLogoRequest  $request)
    {
        TypeLogo::create($request->all());
        return redirect()->route('tipoLogo.index')->with('success', 'Tipo de logo registrado correctamente');
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
        $typeLogos = TypeLogo::latest()->paginate(5);
        $typeLogo = TypeLogo::findOrFail($id);
        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "tipo de logos", 'name' => "Tipo de logos"], ['name' => "Editando etiqueta"],
        ];
        return view('admin.pages.typeLogo.edit', compact('breadcrumbs', 'typeLogos', 'typeLogo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeLogoRequest $request, $id)
    {
        // dd($id);

        TypeLogo::find($id)->update($request->all());
        // $category->update($request->all());
       return redirect()->route('tipoLogo.edit', $id)->with('info', 'Tipo de logo actualizado correctamente');
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
        TypeLogo::findOrFail($id)->delete();
        return redirect()->route('tipoLogo.index')->with('warning', 'Tipo de logo eliminado correctamente');
    }

}
