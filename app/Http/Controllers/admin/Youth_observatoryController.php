<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AboutObservatoryRequest;
use App\Http\Requests\admin\Youth_observatoryRequest;
use App\Models\admin\Youth_observatory;


class Youth_observatoryController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de Nosotros Observatorio"],
        ];

        return view('admin.pages.youthObservatory.index', compact('breadcrumbs'));
    }

    public function create()
    {
        
       
        //$aboutsObservatory=AdminAboutObservatory::latest()->paginate(5);
        $youthObservatory=Youth_observatory::all();
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "juvenilesObservatorio", 'name' => "Observatorio"], ['name' => "Registrando observatorio"],
        ];
        return view('admin.pages.youthObservatory.create', compact('breadcrumbs','youthObservatory'));
    }

    public function store(Youth_observatoryRequest $request)
    {//AboutObservatory::create($request->all())
        Youth_observatory::create($request->all());
       // die();
        return redirect()->route('juvenilesObservatorio.index')->with('success', 'Registrado correctamente');
    }


    public function edit(Youth_observatory $request, $id)
    {
       // $categories = Category::latest()->paginate(5);
        $youObservatory = Youth_observatory::findOrFail($id);
        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "juvenilesObservatorio", 'name' => "Observatorio"], ['name' => "Registrando observatorio"],
        ];
        return view('admin.pages.youthObservatory.edit', compact('breadcrumbs', 'youObservatory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Youth_observatoryRequest $request, $id)
    {
         
        Youth_observatory::find($id)->update($request->all());
        // $category->update($request->all());
        return redirect()->route('juvenilesObservatorio.index', $id)->with('info', 'Registro actualizado correctamente');
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
        Youth_observatory::findOrFail($id)->delete();
        return redirect()->route('juvenilesObservatorio.index')->with('warning', 'Registro eliminado correctamente');
    }
}
